<?php

class Part extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_part');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['part'] = $this->M_part->viewPart();
        $this->load->view('part/data', $data);
    }


    public function tambah()
    {
      $data['kodeunik'] = $this->M_part->buat_kode(); 
      $validation = $this->form_validation; 
      $data['user'] = $this->M_auth->viewUser();

        $validation->set_rules('kd_part', 'kd_part', 'required');
        $validation->set_rules('nama', 'nama', 'required');
        $validation->set_rules('harga', 'harga', 'required');
        $validation->set_rules('stok', 'stok', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if($validation->run() == FALSE)
        {
            $this->load->view('part/tambah', $data);
        } else {
          $this->M_part->tambahPart();
          redirect('part');

        }
    }

    public function hapus($kd_part)
    {
        $this->M_part->hapus($kd_part);
        redirect('part');
    }

    public function ubah($kd_part)
    {
        $validation = $this->form_validation; 
        $data['part'] = $this->M_part->getById($kd_part);

        $validation->set_rules('nama', 'nama', 'required');
        $validation->set_rules('harga', 'harga', 'required');
        $validation->set_rules('stok', 'stok', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE)
          {
            $this->load->view('part/ubah', $data);
          } else {
            $this->M_part->ubahPart();
            redirect('part');
          }
    }
}
