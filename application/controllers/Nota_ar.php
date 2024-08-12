<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Nota_ar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_nota_ar');
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
        $this->load->model('M_bank');
        $this->load->model('M_kwitansi');
    }

//--------------------------------------------------Nota Debit----------------------------------------------------------
    public function indexDebit()
    {
        $data['notaAr'] = $this->M_nota_ar->viewNotaAr();
        $this->load->view('nota_debit_ar/data', $data);
    }

    public function tambahDebit()
    {
        $kodeunik1 = $this->M_nota_ar->buat_kode_nota_ar();
        $data['kodekas'] = $this->M_nota_ar->buat_kode_nota_ar();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('tgl_gl', 'Tgl_gl', 'required');
        $validation->set_rules('kode_cust', 'Kode_cust', 'required');
        $validation->set_rules('customer', 'Customer', 'required');
        $validation->set_rules('penerimaan', 'penerimaan', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('selisih', 'selisih', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        if($validation->run() == FALSE) 
        {

            $this->load->view('nota_debit_ar/tambah', $data);

        } else {

          $this->M_nota_ar->tambahNotaAr();
          $url = "http://localhost/body-repair/nota_ar/ubahDebit/$kodeunik1";
          // $url = "http://103.57.9.39/body-repair/spk/ubah/$kodeunik1";
          redirect($url);

        }
    }

    public function ubahDebit($no_dok)
    {

        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;
        $data['nota'] = $this->M_nota_ar->getById($no_dok);
        $data['detailnota'] = $this->M_nota_ar->viewdetailNotaAr();
        $kodeunik1 = $this->M_nota_ar->buat_kode_detail_nota_ar();
        $data['kodedetail'] = $this->M_nota_ar->buat_kode_detail_nota_ar();
        $data['kodenota'] = $this->M_nota_ar->buat_kode_nota_ar();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
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
            $this->load->view('nota_debit_ar/ubah', $data);

          } else{

            $this->M_nota_ar->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

    public function postingNotaDebit($no_dok)
    {
        $this->M_nota_ar->postingNotaDebit($no_dok);
        redirect('nota_ar/indexDebit');
    }

//------------------------------------------------Nota Kredit------------------------------------------------------------
    
    public function indexKredit()
    {
        $data['notaAr'] = $this->M_nota_ar->viewNotaKreditAr();
        $this->load->view('nota_kredit_ar/data', $data);
    }

    public function tambahkredit()
    {
        $kodeunik1 = $this->M_nota_ar->buat_kode_nota_kredit_ar();
        $data['kodekas'] = $this->M_nota_ar->buat_kode_nota_kredit_ar();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('tgl_gl', 'Tgl_gl', 'required');
        $validation->set_rules('kode_cust', 'Kode_cust', 'required');
        $validation->set_rules('customer', 'Customer', 'required');
        $validation->set_rules('penerimaan', 'penerimaan', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('selisih', 'selisih', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        if($validation->run() == FALSE) 
        {

          $this->load->view('nota_kredit_ar/tambah', $data);

        } else {

          $this->M_nota_ar->tambahNotaKreditAr();
          $url = "http://localhost/body-repair/nota_ar/ubahKredit/$kodeunik1";
          // $url = "http://103.57.9.39/body-repair/spk/ubah/$kodeunik1";
          redirect($url);

        }
    }

    public function ubahkredit($no_dok)
    {

        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;
        $data['nota'] = $this->M_nota_ar->getById2($no_dok);
        $data['detailnota'] = $this->M_nota_ar->viewdetailNotaAr();
        $kodeunik1 = $this->M_nota_ar->buat_kode_detail_nota_ar();
        $data['kodedetail'] = $this->M_nota_ar->buat_kode_detail_nota_ar();
        $data['kodenota'] = $this->M_nota_ar->buat_kode_nota_ar();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
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
            $this->load->view('nota_kredit_ar/ubah', $data);

          } else{

            $this->M_nota_ar->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

    public function postingNotaKredit($no_dok)
    {
        $this->M_nota_ar->postingNotaKredit($no_dok);
        redirect('nota_ar/indexKredit');
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

//---------------------------------------------------- Laporan -------------------------------------------------------------

    public function printDebit ($no_dok)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation;
        $data['nota'] = $this->M_nota_ar->getById($no_dok);
        $data['detailnota'] = $this->M_nota_ar->viewdetailNotaAr();
        $kodeunik1 = $this->M_nota_ar->buat_kode_detail_nota_ar();
        $data['kodedetail'] = $this->M_nota_ar->buat_kode_detail_nota_ar();
        $data['kodenota'] = $this->M_nota_ar->buat_kode_nota_ar();
      
        $this->load->view('laporan/print_notaDebitAr', $data);     
    }

    public function printKredit ($no_dok)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation;
        $data['nota'] = $this->M_nota_ar->getById2($no_dok);
        $data['detailnota'] = $this->M_nota_ar->viewdetailNotaAr();
        $kodeunik1 = $this->M_nota_ar->buat_kode_detail_nota_ar();
        $data['kodedetail'] = $this->M_nota_ar->buat_kode_detail_nota_ar();
        $data['kodenota'] = $this->M_nota_ar->buat_kode_nota_ar();
      
        $this->load->view('laporan/print_notaKreditAr', $data);
    }

}

   