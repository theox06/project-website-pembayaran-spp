<?php

class KelasController extends Controller
{
    public function __construct()
    {
        checkIsNotLogin();

        if ($_SESSION['level'] !== 'Admin') {
            header("Location:http://localhost/project_pkl_1/");
        }
    }

    public function index()
    {
        $data = $this->model('Kelas')->getAll();
        $this->view('kelas/home', $data);
    }

    public function create()
    {
        $this->view('kelas/create');
    }

    public function store()
    {
        if ($this->model('kelas')->create($_POST) > 0) {
            redirectTo('success', 'Data Kelas berhasil di rekam!', '/kelas');
        }
    }

    public function edit($id)
    {
        $data = $this->model('Kelas')->getById($id);
        $this->view('kelas/edit', $data);
    }

    public function update($id)
    {
        if ($this->model('Kelas')->update($id) > 0) {
            redirectTo('success', 'Data berhasil di edit!', '/kelas');
        } else {
            redirectTo('info', 'Tidak ada perubahan data!', '/kelas');
        }


    }

    public function delete($id)
    {
        if ($this->model('Kelas')->delete($id) > 0) {
            redirectTo('success', 'Data Kelas berhasil di hapus!', '/kelas');
        }
    }
}