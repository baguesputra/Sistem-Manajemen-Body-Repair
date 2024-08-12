<?php

class Bahan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_bahan');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['bahan'] = $this->M_bahan->viewBahan();
        $this->load->view('bahan/data', $data);
    }

    public function tambah()
    {
      $data['kodeunik'] = $this->M_bahan->buat_kode(); 
      $validation = $this->form_validation; 
      $data['user'] = $this->M_auth->viewUser();

        $validation->set_rules('kd_bahan', 'kd_bahan', 'required');
        $validation->set_rules('nama', 'nama', 'required');
        $validation->set_rules('jumlah', 'Jumlah', 'required');
        $validation->set_rules('ket', 'Ket', 'required');
        $validation->set_rules('harga', 'Harga', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if($validation->run() == FALSE) 
        {
            $this->load->view('bahan/tambah', $data);
        } else {
          $this->M_bahan->tambahBahan();
          redirect('bahan');

        }
    }

    public function ubah($kd_bahan)
    {
        $validation = $this->form_validation; 
        $data['bahan'] = $this->M_bahan->getById($kd_bahan);

        $validation->set_rules('nama', 'nama', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('ket', 'Ket', 'required');
        $validation->set_rules('harga', 'Harga', 'required');

        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) 
          {
            $this->load->view('bahan/ubah', $data);
          } else {
            $this->M_bahan->ubahBahan();
            redirect('bahan');
          }

    }

    public function hapus($kd_bahan)
    {
        $this->M_bahan->hapus($kd_bahan);
        redirect('bahan');
    }

}