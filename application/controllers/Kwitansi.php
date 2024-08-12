<?php

class Kwitansi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kwitansi');
    }

    public function index()
    {
        $data['kwitansi'] = $this->M_kwitansi->viewKwitansi();
        $this->load->view('kwitansi/data', $data);
    }

    public function tambah()
    {
        $data['kode'] = $this->M_kwitansi->no_kwitansi();
        $validation = $this->form_validation;

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required'); 


        if($validation->run() == FALSE) 
        {
            $this->load->view('kwitansi/tambah', $data);
        } else {
          $this->M_kwitansi->tambahKwitansi();
          redirect('kwitansi');
        }
    }

    public function hapus($no_kwitansi)
    {
        $this->M_kwitansi->hapus($no_kwitansi);
        redirect('kwitansi');
    }

    public function ubah($no_kwitansi)
    {
        $validation = $this->form_validation; 
        $data['kwitansi'] = $this->M_kwitansi->getById($no_kwitansi);


        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) 
          {
            $this->load->view('kwitansi/ubah', $data);
          } else {
            $this->M_kwitansi->ubahKwitansi();
            redirect('kwitansi');
          }

    }

    public function laporan($no_kwitansi)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $data['kwitansi'] = $this->M_kwitansi->getById($no_kwitansi);

            $this->load->view('laporan/kwitansi', $data);
    }

    public function post($no_kwitansi)
    {
        $this->M_kwitansi->post($no_kwitansi);
        redirect('kwitansi');
    }

    public function view($no_kwitansi){
        $data['kwitansi'] = $this->M_kwitansi->getById($no_kwitansi);
        $this->load->view('kwitansi/view', $data);
    }

}
