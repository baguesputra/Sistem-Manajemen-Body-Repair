<?php

class Bank extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_bank');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['bank'] = $this->M_bank->viewBank();
        $this->load->view('bank/data', $data);
    }

    public function tambah()
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode

        $data['user'] = $this->M_auth->viewUser();

        $validation->set_rules('kd_bank', 'Kd_bank', 'required');
        $validation->set_rules('nama', 'Nama', 'required');
       
        $validation->set_rules('no_account', 'No_account', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required'); 


        if($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('bank/tambah', $data);
        } else {
          $this->M_bank->tambahBank ();
          redirect('bank');
        }
    }

    public function hapus($kd_bank)
    {
        $this->M_bank->hapus($kd_bank);
        redirect('bank');
    }

    public function ubah($kd_bank)
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode
        $data['bank'] = $this->M_bank->getById($kd_bank);

        $validation->set_rules('nama', 'Nama', 'required');
        $validation->set_rules('account', 'account', 'required');
        $validation->set_rules('no_account', 'No_account', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
          {
            $this->load->view('bank/ubah', $data);
          } else {
            $this->M_bank->ubahBank();
            redirect('bank');
          }

    }

}
