<?php

class ProfilController extends Controller
{
    public function __construct()
    {
        checkIsNotLogin();
    }

    public function index()
    {
        if ($_SESSION['level'] === 'Siswa') {
        	$profil = $this->model('Siswa')->getJoinOne(['users', 'kelas', 'spp'], '', " WHERE siswa.id_users = ".$_SESSION['id_users']);
        	$spp = $this->model('Pembayaran')->getJoinAll(['petugas', 'spp'], " WHERE pembayaran.id_siswa = ".$profil['id_siswa']);
        	$this->view('profil/siswa', [
        		'profil'		=>	$profil,
        		'pembayaran'	=>	$spp
        	]);
        } else {
        	$data = $this->model('Petugas')->getJoinOne(['users'], '', " WHERE petugas.id_users = ".$_SESSION['id_users']);
        	$this->view('profil/home', $data);
        }
    }

    public function foto()
    {

    	// echo "<pre>";
    	// print_r($_FILES);
    	// echo "</pre>";
    	$type = explode('/', $_FILES['gambar']['type']);
    	$namaFile = uniqid().".".end($type);

    	// periksa ekstensi gambar
    	if (array_search(end($type), ['jpeg', 'jpg', 'png']) !== false) {
    		// periksa ukuran gambar
    		if ($_FILES['gambar']['size'] >= 3000000) {
    			redirectTo('warning', 'Maaf, ukuran gambar terlalu besar, max 3mb!', '/profil');
    		} else {
    			// upload
    			move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$namaFile);
    			if ($this->model('User')->upload($namaFile) > 0) {
		    		redirectTo('success', 'Foto Profil berhasil di update!', '/profil');
		    	}
    		}
    	} else {
    		redirectTo('warning', 'Maaf, ekstensi tersebut tidak didukung!', '/profil');
    	}
    	
    }

    public function password()
    {
    	// [password-lama] => dfffdfdfdf
    	// [password-baru] => fdfdfdfdfdf
    	// [konfirmasi-password-baru] => fdfdfdfdfd
    	$data = getProfil();
    	// periksa password
    	if (password_verify($_POST['password-lama'] , $data['password'])) {
    		// periksa kecocokan password baru dengan konfirmasi password baru
    		if ($_POST['password-baru'] === $_POST['konfirmasi-password-baru']) {
    			if ($this->model('User')->gantiPassword(password_hash($_POST['password-baru'], PASSWORD_DEFAULT)) > 0) {
    				redirectTo('success', 'Selamat, Password berhasil di update!', '/profil');
    			}
    		} else {
    			redirectTo('warning', 'Maaf, Konfirmasi password baru salah!', '/profil');
    		}
    	} else {
    		redirectTo('warning', 'Maaf, Password salah!', '/profil');
    	}
    }
}