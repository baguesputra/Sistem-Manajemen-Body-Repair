<?php defined('BASEPATH') OR exit('No direct script access allowed');
class bbkk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_spk');
        $this->load->model('M_asuransi');
        $this->load->model('M_customer');
        $this->load->model('M_kendaraan');
        $this->load->model('M_sa');
        $this->load->model('M_fm');
        $this->load->model('M_detail');
        $this->load->model('M_jenis');
        $this->load->model('M_part');
        $this->load->model('M_bahan');
        $this->load->model('M_bbkk');
        $this->load->model('M_bank');
        $this->load->model('M_kwitansi');
        $this->load->model('M_account');
        $this->load->model('M_supplier');
    }

//---------------------------------------------------Bank Keluar---------------------------------------------------------
    public function indexBbk()
    {
        $data['bbk'] = $this->M_bbkk->viewBbk();
        $this->load->view('bbk/data', $data);
    }


    public function tambahBbk()
    {
        $kodeunik1 = $this->M_bbkk->buat_kode_bbk();
        $data['kodebbk'] = $this->M_bbkk->buat_kode_bbk();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('kd_bank', 'Kd_bank', 'required');
        $validation->set_rules('bayar', 'bayar', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('selisih', 'selisih', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        if($validation->run() == FALSE) 
        {

            $this->load->view('bbk/tambah', $data);

        } else {

          $this->M_bbkk->tambahbbk();
          $url = "http://localhost/body-repair/bbkk/ubahBbk/$kodeunik1";
          // $url = "http://103.57.9.39/body-repair/bbkk/ubahBbk/$kodeunik1";
          redirect($url);

        }
    }

    public function ubahBbk($no_dok)
    {

        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;
        $data['bbk'] = $this->M_bbkk->getByIdBbk($no_dok);
        $data['bank'] = $this->M_bank->viewBank();
        $data['detailbbkk'] = $this->M_bbkk->viewdetailBbkk();
        $kodeunik1 = $this->M_bbkk->buat_kode_bbk();
        $data['kodebbk'] = $this->M_bbkk->buat_kode_bbk();
        $data['kodedetail'] = $this->M_bbkk->buat_kode_detail_bbkk();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('kd_bank', 'Kd_bank', 'required');
        $validation->set_rules('bayar', 'bayar', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('selisih', 'selisih', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        $validationdetail->set_rules('kd_detail', 'kd_detail');
        $validationdetail->set_rules('no_spk', 'no_spk');
        $validationdetail->set_rules('kd_jenis', 'kd_jenis');
        $validationdetail->set_rules('jumlah', 'jumlah');
        $validationdetail->set_rules('harga', 'harga');
        $validationdetail->set_rules('diskon', 'diskon');
        $validationdetail->set_rules('total', 'total');

        if ($validation->run() == FALSE)
          {
            $this->load->view('bbk/ubah', $data);

          } else{

            $this->M_bbkk->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

    public function postingBbk($no_dok)
    {
        $this->M_bbkk->postingBbk($no_dok);
        redirect('bbkk/indexBbk');
    }


//------------------------------------------------ Kas Keluar -------------------------------------------------------------
   
    public function indexBkk()
    {
        $data['bkk'] = $this->M_bbkk->viewBkk();
        $this->load->view('bkk/data', $data);
    }


    public function tambahBkk()
    {
        $kodeunik1 = $this->M_bbkk->buat_kode_bkk();
        $data['kodebkk'] = $this->M_bbkk->buat_kode_bkk();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('kd_bank', 'Kd_bank', 'required');
        $validation->set_rules('bayar', 'bayar', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('selisih', 'selisih', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        if($validation->run() == FALSE) 
        {

            $this->load->view('bkk/tambah', $data);

        } else {

          $this->M_bbkk->tambahBkk();
          $url = "http://localhost/body-repair/bbkk/ubahBkk/$kodeunik1";
          // $url = "http://103.57.9.39/body-repair/bbkk/ubahBbk/$kodeunik1";
          redirect($url);

        }
    }

    public function ubahBkk($no_dok)
    {

        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;
        $data['bkk'] = $this->M_bbkk->getByIdBkk($no_dok);
        $data['bank'] = $this->M_bank->viewBank();
        $data['detailbbkk'] = $this->M_bbkk->viewdetailBbkk();
        $kodeunik1 = $this->M_bbkk->buat_kode_bkk();
        $data['kodebbk'] = $this->M_bbkk->buat_kode_bkk();
        $data['kodedetail'] = $this->M_bbkk->buat_kode_detail_bbkk();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'tgl', 'required');
        $validation->set_rules('ket', 'ket', 'required');

      
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');


        if ($validation->run() == FALSE)
          {
            $this->load->view('bkk/ubah', $data);

          } else{

            $this->M_bbkk->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

    public function postingBkk($no_dok)
    {
        $this->M_bbkk->postingBkk($no_dok);
        redirect('bbkk/indexBkk');
    }

//------------------------------------------------ Data Pop ---------------------------------------------------------------

    public function popcustomerdata()
    {
        $data['cst'] = $this->M_customer->viewCustomer();
        $this->load->view('datapop/popcustomerdata', $data);
    }

    public function popbank()
    {
      $data['bank'] = $this->M_bank->viewBank(); 
      $this->load->view('datapop/popbank', $data);
    }

    public function popinvoice()
    {
      $data['spk'] = $this->M_spk->statusSpk();
      $data['sa'] = $this->M_sa->viewSa();
      $data['detail'] = $this->M_detail->dataDetail();
      $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
      $this->load->view('datapop/popinvoice', $data);
    }

    public function popkwitansi()
    {
      $data['kwitansi'] = $this->M_kwitansi->viewKwitansi();
      $this->load->view('datapop/popkwitansi', $data);
    }

    public function poppemasok()
    {
      $data['asr'] = $this->M_supplier->viewSupplier();
      $this->load->view('datapop/poppemasok', $data);
    }

    public function popaccount()
    {
      $data['account'] = $this->M_account->viewAccount();
      $this->load->view('datapop/popaccount', $data);
    }

    public function popaccount2()
    {
      $data['account'] = $this->M_account->viewAccount();
      $this->load->view('datapop/popaccount2', $data);
    }



//---------------------------------------------------- Laporan -------------------------------------------------------------
   
    public function printBbk ($no_dok)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation;
        $data['data_bbk'] = $this->M_bbkk->viewBbk();
        $data['bbk'] = $this->M_bbkk->getByIdBbk($no_dok);
        $data['bank'] = $this->M_bank->viewBank();
        $data['detailbbkk'] = $this->M_bbkk->viewdetailBbkk();
        $data['kodedetail'] = $this->M_bbkk->buat_kode_detail_bbkk();
        $data['account'] = $this->M_account->viewAccount();

      
        $this->load->view('laporan/print_bbk', $data);

         
    }

    public function printBkk ($no_dok)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation;
        $data['data_bkk'] = $this->M_bbkk->viewBkk();
        $data['bkk'] = $this->M_bbkk->getByIdBkk($no_dok);
        $data['bank'] = $this->M_bank->viewBank();
        $data['detailbbkk'] = $this->M_bbkk->viewdetailBbkk();
        $data['kodedetail'] = $this->M_bbkk->buat_kode_detail_bbkk();
        $data['account'] = $this->M_account->viewAccount();

      
        $this->load->view('laporan/print_bkk', $data);

         
    }
}

   