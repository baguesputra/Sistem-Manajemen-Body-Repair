<?php defined('BASEPATH') OR exit('No direct script access allowed');
class bbkt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_spk');
        $this->load->model('M_sa');
        $this->load->model('M_detail');
        $this->load->model('M_kendaraan');
        $this->load->model('M_asuransi');
        $this->load->model('M_customer');
        $this->load->model('M_bbkt');
        $this->load->model('M_bank');
        $this->load->model('M_kwitansi');
        $this->load->model('M_account');
    }
//----------------------------------------------------- Bank Terima -----------------------------------------------------
   
    public function indexBbt()
    {
        $data['bbt'] = $this->M_bbkt->viewbbt();
        $this->load->view('bbt/data', $data);
    }

    public function tambahBbt()
    {
        $kodeunik1 = $this->M_bbkt->buat_kode_bbt();
        $data['kodebbt'] = $this->M_bbkt->buat_kode_bbt();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('kode_cust', 'Kode_cust', 'required');
        $validation->set_rules('customer', 'Customer', 'required');
        $validation->set_rules('kd_bank', 'Kd_bank', 'required');
        $validation->set_rules('penerimaan', 'penerimaan', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('selisih', 'selisih', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        if($validation->run() == FALSE) 
        {

            $this->load->view('bbt/tambah', $data);

        } else {

          $this->M_bbkt->tambahbbt();
          $url = "http://localhost/body-repair/bbkt/ubahBbt/$kodeunik1";
          // $url = "http://103.57.9.39/body-repair/bbkt/ubahBbt//$kodeunik1";
          redirect($url);

        }
    }

    public function ubahBbt($no_dok)
    {

        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;
        $data['bbt'] = $this->M_bbkt->getById($no_dok);
        $data['detailbbkt'] = $this->M_bbkt->viewdetailBbkt();
        $data['bank'] = $this->M_bank->viewBank();
        $kodeunik1 = $this->M_bbkt->buat_kode_detail_bbkt();
        $data['kodedetail'] = $this->M_bbkt->buat_kode_detail_bbkt();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('kd_bank', 'Kd_bank', 'required');
        $validation->set_rules('penerimaan', 'penerimaan', 'required');
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
            $this->load->view('bbt/ubah', $data);

          } else{

            $this->M_bbkt->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

    public function postingBbt($no_dok)
    {
        $this->M_bbkt->posting($no_dok);
        redirect('bbkt/indexBbt');
    }

    public function hapusDetail($kode)
    {
        $this->M_bbkt->hapusDetail($kode);
        $url = $_SERVER['HTTP_REFERER'];
        redirect($url);
    }
//------------------------------------------------Kas Terima--------------------------------------------------------------
    public function indexBkt()
    {
        $data['bkt'] = $this->M_bbkt->viewBkt();
        $this->load->view('bkt/data', $data);
    }


    public function tambahBkt()
    {
        $data['kodebkt'] = $this->M_bbkt->buat_kode_bkt();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('kode_cust', 'Kode_cust', 'required');
        $validation->set_rules('customer', 'Customer', 'required');
        $validation->set_rules('kd_bank', 'Kd_bank', 'required');
        $validation->set_rules('penerimaan', 'penerimaan', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('selisih', 'selisih', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        if($validation->run() == FALSE) 
        {

            $this->load->view('bkt/tambah', $data);

        } else {

          $this->M_bbkt->tambahBkt();
          $url = "http://localhost/body-repair/spk/ubah/$kodeunik1";
          // $url = "http://103.57.9.39/body-repair/spk/ubah/$kodeunik1";
          redirect($url);

        }
    }

    public function hapusBkt($no_dok)
    {

        $this->M_spk->hapus($no_dok);
        redirect('spk');
    }

    public function postingBkt($no_dok)
    {
        $this->M_bbkt->posting($no_dok);
        redirect('bbkt/indexBkt');
    }

    public function ubahBkt($no_dok)
    {

        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;
        $data['bkt'] = $this->M_bbkt->getByIdBkt($no_dok);
        $data['detailbbkt'] = $this->M_bbkt->viewdetailBbkt();
        $data['bank'] = $this->M_bank->viewBank();
        $kodeunik1 = $this->M_bbkt->buat_kode_detail_bbkt();
        $data['kodebkt'] = $this->M_bbkt->buat_kode_bkt();
        $data['kodedetail'] = $this->M_bbkt->buat_kode_detail_bbkt();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('kd_bank', 'Kd_bank', 'required');
        $validation->set_rules('penerimaan', 'penerimaan', 'required');
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
            $this->load->view('bkt/ubah', $data);

          } else{

            $this->M_bbkt->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }
   
//------------------------------------------------ Data Pop ---------------------------------------------------------------

    public function popasuransidata()
    {
        $data['asr'] = $this->M_asuransi->viewAsuransi();
        $this->load->view('datapop/popasuransidata', $data);
    }

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

//---------------------------------------------------- Laporan -------------------------------------------------------------


    public function printBbt ($no_dok)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation;
        $data['data_bbt'] = $this->M_bbkt->viewbbt();
        $data['bbt'] = $this->M_bbkt->getById($no_dok);
        $data['detailbbkt'] = $this->M_bbkt->viewdetailBbkt();
        $data['bank'] = $this->M_bank->viewBank();
        $data['kodedetail'] = $this->M_bbkt->buat_kode_detail_bbkt();
        $data['account'] = $this->M_account->viewAccount();
      
        $this->load->view('laporan/print_bbt', $data);     
    }

    public function printBkt ($no_dok)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation;
        $data['bkt'] = $this->M_bbkt->viewBkt();
        $data['bkt'] = $this->M_bbkt->getByIdBkt($no_dok);
        $data['detailbbkt'] = $this->M_bbkt->viewdetailBbkt();
        $data['bank'] = $this->M_bank->viewBank();
        $data['kodebkt'] = $this->M_bbkt->buat_kode_bkt();
        $data['kodedetail'] = $this->M_bbkt->buat_kode_detail_bbkt();
        $data['account'] = $this->M_account->viewAccount();
      
        $this->load->view('laporan/print_bkt', $data);
    }
}

   