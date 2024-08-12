<?php
class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_supplier');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['supplier'] = $this->M_supplier->viewSupplier();
        $this->load->view('supplier/data', $data);
    }

    public function tambah()
    {
        $data['kodeunik'] = $this->M_supplier->buat_kode(); 
        $validation = $this->form_validation;
        $data['user'] = $this->M_auth->viewUser();

        $validation->set_rules('kd_supplier', 'kd_supplier', 'required');
        $validation->set_rules('nama', 'nama', 'required');
        $validation->set_rules('alamat', 'alamat', 'required');
        $validation->set_rules('no', 'no', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if($validation->run() == FALSE) 
        {
            $this->load->view('supplier/tambah', $data);
        } else {
          $this->M_supplier->tambah();
          redirect('supplier');

        }
    }

    public function ubah($kd_supplier)
    {
        $validation = $this->form_validation; 
        $data['supplier'] = $this->M_supplier->getById($kd_supplier);

        $validation->set_rules('nama', 'nama', 'required');
        $validation->set_rules('alamat', 'alamat', 'required');
        $validation->set_rules('no', 'no', 'required');

        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE)
          {
            $this->load->view('supplier/ubah', $data);
          } else {
            $this->M_supplier->ubah();
            redirect('supplier');
          }

    }

    public function hapus($kd_supplier)
    {
        $this->M_supplier->hapus($kd_supplier);
        redirect('supplier');
    }

}