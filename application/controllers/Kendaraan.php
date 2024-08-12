<?php
class Kendaraan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kendaraan');
        $this->load->model('M_customer');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['customer'] = $this->M_customer->viewCustomer();
        $this->load->view('kendaraan/data', $data);
    }


    public function tambah()
    {
        $data['kodeunik'] = $this->M_kendaraan->buat_kode(); 
        $data['user'] = $this->M_auth->viewUser();
        $validation = $this->form_validation; 

        $validation->set_rules('kd_kendaraan', 'kd_kendaraan', 'required');
        $validation->set_rules('no_polisi', 'No_polisi', 'required');
        $validation->set_rules('brand', 'Brand', 'required');
        $validation->set_rules('kd_rangka', 'Kd_rangka', 'required');
        $validation->set_rules('no_rangka', 'No_rangka', 'required');
        $validation->set_rules('kd_mesin', 'Kd_mesin', 'required');
        $validation->set_rules('no_mesin', 'No_mesin', 'required');
        $validation->set_rules('model', 'Model', 'required');
        $validation->set_rules('trans', 'Trans', 'required');
        $validation->set_rules('tahun', 'Tahun', 'required');
        $validation->set_rules('warna', 'Warna', 'required');
        $validation->set_rules('kd_customer', 'Kd_customer', 'required');
        $validation->set_rules('nama_customer', 'nama_customer', 'required');


        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');


        if($validation->run() == FALSE) 
        {
            $this->load->view('kendaraan/tambah', $data);
        } else {
          $this->M_kendaraan->tambahKendaraan();
          redirect('kendaraan');
        }
    }

    public function hapus($kd_kendaraan)
    {
        $this->M_kendaraan->hapus($kd_kendaraan);
        redirect('kendaraan');
    }

    public function ubah($kd_kendaraan)
    {
        $validation = $this->form_validation; 
        $data['kendaraan'] = $this->M_kendaraan->getById($kd_kendaraan);

        $validation->set_rules('no_polisi', 'No_polisi', 'required');
        $validation->set_rules('brand', 'Brand', 'required');
        $validation->set_rules('kd_rangka', 'Kd_rangka', 'required');
        $validation->set_rules('no_rangka', 'No_rangka', 'required');
        $validation->set_rules('kd_mesin', 'Kd_mesin', 'required');
        $validation->set_rules('no_mesin', 'No_mesin', 'required');
        $validation->set_rules('model', 'Model', 'required');
        $validation->set_rules('trans', 'Trans', 'required');
        $validation->set_rules('tahun', 'Tahun', 'required');
        $validation->set_rules('warna', 'Warna', 'required');
        $validation->set_rules('kd_customer', 'Kd_customer', 'required');
        $validation->set_rules('nama_customer', 'nama_customer', 'required');

        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) 
          {
            $this->load->view('kendaraan/ubah', $data);
          } else {
            $this->M_kendaraan->ubahKendaraan();
            redirect('kendaraan');
          }

    }

    public function popcustomer()
    {
      $data['cst'] = $this->M_customer->viewCustomer();
      $this->load->view('datapop/popcustomer', $data);
    }


}
