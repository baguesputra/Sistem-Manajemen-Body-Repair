<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    public function index()
    {
        $data['user'] = $this->M_user->viewUser();
        $this->load->view('user/data', $data);
    }

    public function tambah()
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode
        $validation->set_rules('nama', 'Nama', 'required');

        if($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('user/tambah');
        } else {
          $this->M_user->tambah();
          redirect('user');
        }
    }

    public function nonAktif($id)
    {
        $this->M_user->nonAktif($id);
        redirect('user');
    }



}