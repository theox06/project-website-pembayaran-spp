<?php
use Dompdf\Dompdf;

class PembayaranController extends Controller
{
    public function __construct()
    {
        checkIsNotLogin();

        if ($_SESSION['level'] !== 'Admin' && $_SESSION['level'] !== 'Petugas') {
        	header("Location:http://localhost/project_pkl_1/");
        }
    }

    public function index()
    {
        $this->view('pembayaran/home');
    }

    public function show()
    {
        $siswa = $this->model('Siswa')->getJoinOne(['users', 'spp', 'kelas'], '', " WHERE siswa.nisn = ".$_GET['nisn']);

        if (!empty($siswa)) {
            $id_siswa   = $siswa['id_siswa'];
            $id_spp     = $siswa['id_spp'];
            $pembayaran = $this->model('Pembayaran')->getJoinAll(['spp', 'petugas'], " WHERE pembayaran.id_siswa = ".$id_siswa." AND pembayaran.id_spp = " .$id_spp);
            $data = [
                'profil'        => $siswa,
                'pembayaran'    => $pembayaran
            ];

            $this->view('pembayaran/show', $data);
            
        } else {
            redirectTo('warning', 'Maaf, Siswa tidak terdaftar!', '/pembayaran');
        }
    }

    public function bayar()
    {
        $petugas = $this->model('Petugas')->getJoinOne(['users'], '', "WHERE petugas.id_users = ".$_SESSION['id_users']);
        
        if ($this->model('Pembayaran')->bayar($petugas['id_petugas'], $_POST['jumlah_bayar'], $_POST['id_pembayaran']) > 0) {
            redirectTo('success', 'Selamat, SPP berhasil di bayar !', '/pembayaran/show?nisn='.$_POST['nisn']);
        }
    }

    public function lunas()
    {
        $petugas = $this->model('Petugas')->getJoinOne(['users'], '', "WHERE petugas.id_users = ".$_SESSION['id_users']);
        
        if ($this->model('Pembayaran')->bayar($petugas['id_petugas'], $_POST['jumlah_bayar'], $_POST['id_pembayaran']) > 0) {
            redirectTo('success', 'Selamat, SPP berhasil di bayar lunas!', '/pembayaran/show?nisn='.$_POST['nisn']);
        }
    }

    public function cetak($nisn)
    {
        $no = 1;
        $siswa = $this->model('Siswa')->getJoinOne(['users', 'spp', 'kelas'], '', " WHERE siswa.nisn = ".$nisn);

        $id_siswa   = $siswa['id_siswa'];
        $id_spp     = $siswa['id_spp'];
        $pembayaran = $this->model('Pembayaran')->getJoinAll(['spp', 'petugas'], " WHERE pembayaran.id_siswa = ".$id_siswa." AND pembayaran.id_spp = " .$id_spp);

        $html = "<center>";
        $html .= "YAYASAN PEMBINAAN TALENTA GENERASI MUDA-MUDI INDONESIA";
        $html .= "</center>";
        $html .= "<center>";
        $html .= "<h1>SMK PEMBINAAN IDOL DAN VTUBER INDONESIA BOGOR</h1>";
        $html .= "<h3>KARTU SPP PESERTA DIDIK</h3>";
        $html .= "<hr>";
        $html .= "Nisn Siswa/i : ".$siswa['nisn']." | Nama Siswa/i : ".$siswa['nama_siswa']." | Kelas : ".$siswa['nama_kelas'];
        $html .= "<hr>";
        $html .= "<table border='1' cellpadding='10' cellspacing='0'>";
        $html .= "<tr><th>Bulan</th><th>Tgl Bayar</th><th>Tahun di Bayar</th><th>Jumlah Bayar</th><th>Petugas</th><th>Status</th></tr>";
        foreach ($pembayaran as $spp) {
            $html .= "<tr>";
            $html .= "<td>".$spp['bulan_dibayar']."</td>";
            $html .= "<td>".$spp['tgl_bayar']."</td>";
            $html .= "<td>".$spp['tahun_dibayar']."</td>";
            $html .= "<td>".$spp['jumlah_bayar']."</td>";
            $html .= "<td>".$spp['nama_petugas']."</td>";
            $html .= "<td>";
            if ($spp['jumlah_bayar'] === null) {
                $html .= "Belum di Bayar";
            } elseif ($spp['jumlah_bayar'] > 0 && $spp['jumlah_bayar'] < $spp['nominal']) {
                $html .= "Belum lunas, Sisa (Rp. ".$spp['nominal'] - $spp['jumlah_bayar'].")";
            } else {
                $html .= "Lunas";
            }
            $html .= "</td>";
            $html .= "</tr>";
        }
        $html .= "</table>"; 
        $html .= "</center>";
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('4A', 'landscape');
        $dompdf->render();
        $dompdf->stream('kartu_spp-'.$siswa['nama_siswa']."-".$siswa['nama_kelas'], ['Attachment' => 0]);        
    }
}