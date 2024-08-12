<?php

class Asuransi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_asuransi');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $this->load->view('asuransi/data', $data);
    }

    public function tambah()
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode

        $data['user'] = $this->M_auth->viewUser();

        $validation->set_rules('kode', 'Kode', 'required');
        $validation->set_rules('nama', 'Nama', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required'); 


        if($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('asuransi/tambah', $data);
        } else {
          $this->M_asuransi->tambahAsuransi();
          redirect('asuransi');
        }
    }

    public function hapus($kd_asuransi)
    {
        $this->M_asuransi->hapus($kd_asuransi);
        redirect('asuransi');
    }

    public function ubah($kd_asuransi)
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode
        $data['asuransi'] = $this->M_asuransi->getById($kd_asuransi);

        $validation->set_rules('nama', 'Nama', 'required');

        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
          {
            $this->load->view('asuransi/ubah', $data);
          } else {
            $this->M_asuransi->ubahAsuransi();
            redirect('asuransi');
          }

    }

}
