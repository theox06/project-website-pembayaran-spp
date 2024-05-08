<?php

class PetugasController extends Controller
{
    public function __construct()
    {
        checkIsNotLogin();

        if ($_SESSION['level'] !== 'Admin') {
            header("Location:http://localhost/ukk_spp");
        }
    }

    public function index()
    {
        $data = $this->model('Petugas')->getJoinAll(['users']);
        $this->view('petugas/home', $data);
    }

    public function create()
    {
        $this->view('petugas/create');
    }

    public function store()
    {


        // periksa username
        if (usernameCheck($_POST['username'] === 0)) {
            $users = [
                'username' => $_POST['username'],
                'password' => password_hash($_POST['username'], PASSWORD_DEFAULT),
                'level' => $_POST['level'],
                'gambar' => 'avatar4.png'
            ];
            $user_id = $this->model('User')->create($users);

            $petugas = [
                'id_users' => $user_id,
                'nama_petugas' => $_POST['nama_petugas'],
                'no_hp_petugas' => $_POST['no_hp_petugas'],
                'alamat_petugas' => $_POST['alamat_petugas']
            ];

            if ($this->model('Petugas')->create($petugas) > 0) {
                redirectTo('success', 'Data petugas berhasil direkam!', '/petugas');
            }
        } else {
            redirectTo('error', 'Username tersebut sudah terdaftar', '/petugas/create');
        }
    }

    public function detail($id)
    {
        $data = $this->model('Petugas')->getJoinOne(['users'], $id);
        $this->view('petugas/detail', $data);
    }

    public function reset($id)
    {
        if ($this->model('User')->update($id) > 0) {
            redirectTo('success', 'Password berhasil di reset', '/petugas');
        }
    }

    public function edit($id)
    {
        $data = $this->model('User')->getById($id);
        $this->view('petugas/edit', $data);
    }

    public function update($id)
    {
        if ($this->model('User')->update($id) > 0) {
            redirectTo('success', 'Level petugas berhasil di ganti!', '/petugas');
        } else {
            redirectTo('info', 'Tidak ada perubahan data!', '/petugas');
        }
    }

    public function delete($id)
    {
        if ($this->model('User')->delete($id) > 0) {
            redirectTo('success', 'Data berhasil di hapus!', '/petugas');
        }
    }


}