<?php

class Jenis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jenis');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['jenis'] = $this->M_jenis->viewJenis();
        $this->load->view('jenis/data', $data);
    }


    public function tambah()
    {
      $data['kodeunik'] = $this->M_jenis->buat_kode();
      $validation = $this->form_validation;
      $data['user'] = $this->M_auth->viewUser();

        $validation->set_rules('kd_jenis', 'kd_jenis', 'required');
        $validation->set_rules('nama', 'nama', 'required');
      
        $validation->set_rules('harga', 'harga', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if($validation->run() == FALSE)
        {
            $this->load->view('jenis/tambah', $data);
        } else {
          $this->M_jenis->tambahJenis();
          redirect('jenis');

        }
    }

    public function hapus($kd_jenis)
    {
        $this->M_jenis->hapus($kd_jenis);
        redirect('jenis');
    }

    public function ubah($kd_jenis)
    {
        $validation = $this->form_validation; 
        $data['jenis'] = $this->M_jenis->getById($kd_jenis);

        $validation->set_rules('nama', 'nama', 'required');
       
        $validation->set_rules('harga', 'harga', 'required');

        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) 
          {
            $this->load->view('jenis/ubah', $data);
          } else {
            $this->M_jenis->ubahJenis();
            redirect('jenis');
          }

    }

}
