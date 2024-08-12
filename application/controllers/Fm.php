<?php

class Fm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_fm');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['fm'] = $this->M_fm->viewFm();
        $this->load->view('fm/data', $data);
    }


    public function tambah()
    {
        $data['kodeunik'] = $this->M_fm->buat_kode(); 
        $validation = $this->form_validation; 

        $validation->set_rules('kd_fm', 'kd_fm', 'required');
        $validation->set_rules('nama', 'Nama', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');


        if($validation->run() == FALSE) 
        {
            $this->load->view('fm/tambah', $data);
        } else {
          $this->M_fm->tambahFm();
          redirect('fm');
        }
    }

    public function hapus($kd_fm)
    {
        $this->M_fm->hapus($kd_fm);
        redirect('fm');
    }

    public function ubah($kd_fm)
    {
        $validation = $this->form_validation; 
        $data['fm'] = $this->M_fm->getById($kd_fm);

        $validation->set_rules('nama', 'Nama', 'required');

        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) 
          {
            $this->load->view('fm/ubah', $data);
          } else {
            $this->M_fm->ubahFm();
            redirect('fm');
          }

    }

}
