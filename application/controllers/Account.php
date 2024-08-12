<?php

class Account extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_account');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['account'] = $this->M_account->viewAccount();
        $this->load->view('account/data', $data);
    }

    public function tambah()
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode

        $data['user'] = $this->M_auth->viewUser();

        $validation->set_rules('no_account', 'no_account', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required'); 


        if($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('account/tambah', $data);
        } else {
          $this->M_account->tambahAccount();
          redirect('account');
        }
    }

    public function hapus($kd_account)
    {
        $this->M_account->hapus($kd_account);
        redirect('account');
    }

    public function ubah($no_account)
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode
        $data['account'] = $this->M_account->getById($no_account);

        $validation->set_rules('no_account', 'no_account', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        if ($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
          {
            $this->load->view('account/ubah', $data);
          } else {
            $this->M_account->ubahAccount();
            redirect('account');
          }

    }

}
