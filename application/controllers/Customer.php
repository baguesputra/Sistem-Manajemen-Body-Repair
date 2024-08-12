<?php

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_customer');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['customer'] = $this->M_customer->viewCustomer();
        $this->load->view('customer/data', $data);
    }


    public function tambah()
    {
        $data['kodeunik'] = $this->M_customer->buat_kode(); // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
        $validation = $this->form_validation; //untuk menghemat penulisan kode
        $data['user'] = $this->M_auth->viewUser();

        $validation->set_rules('kd_customer', 'kd_customer', 'required');
        $validation->set_rules('nama_customer', 'nama_customer', 'required');
        $validation->set_rules('tipe', 'Tipe', 'required');
        $validation->set_rules('telpon', 'Telpon', 'required');
        $validation->set_rules('no_ktp', 'No_ktp', 'required');
        $validation->set_rules('no_npwp', 'No_npwp', 'required');
        $validation->set_rules('lahir', 'Lahir', 'required');
        $validation->set_rules('alamat', 'Alamat', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');


        if($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('customer/tambah', $data);
        } else {
          $this->M_customer->tambahCustomer();
          redirect('customer');
        }
    }

    public function hapus($kd_customer)
    {
        $this->M_customer->hapus($kd_customer);
        redirect('customer');
    }

    public function ubah($kd_customer)
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode
        $data['customer'] = $this->M_customer->getById($kd_customer);

        $validation->set_rules('nama_customer', 'nama_customer', 'required');
        $validation->set_rules('tipe', 'Tipe', 'required');
        $validation->set_rules('telpon', 'Telpon', 'required');
        $validation->set_rules('no_ktp', 'No_ktp', 'required');
        $validation->set_rules('no_npwp', 'No_npwp', 'required');
        $validation->set_rules('lahir', 'Lahir', 'required');
        $validation->set_rules('alamat', 'Alamat', 'required');

        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
          {
            $this->load->view('customer/ubah', $data);
          } else {
            $this->M_customer->ubahCustomer();
            redirect('customer');
          }

    }

}
