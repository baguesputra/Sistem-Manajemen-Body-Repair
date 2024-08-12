<?php

class Sa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sa');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['sa'] = $this->M_sa->viewSa();
        $this->load->view('sa/data', $data);
    }

    public function tambah()
    {
      $data['kodeunik'] = $this->M_sa->buat_kode(); 
      $validation = $this->form_validation; 
        $validation->set_rules('kd_sa', 'kd_sa', 'required');
        $validation->set_rules('nama', 'Nama', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');


        if($validation->run() == FALSE) 
        {
            $this->load->view('sa/tambah', $data);
        } else {
          $this->M_sa->tambahSa();
          redirect('sa');
        }
    }

    public function hapus($kd_sa)
    {
        $this->M_sa->hapus($kd_sa);
        redirect('sa');
    }

    public function ubah($kd_sa)
    {
        $validation = $this->form_validation; 
        $data['sa'] = $this->M_sa->getById($kd_sa);

        $validation->set_rules('nama', 'Nama', 'required');

        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) 
          {
            $this->load->view('sa/ubah', $data);
          } else {
            $this->M_sa->ubahSa();
            redirect('sa');
          }
    }
}
