<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Bkt extends CI_Controller
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
        $this->load->model('M_bkt');
        $this->load->model('M_bank');
    }

    public function index()
    {
        $data['bkt'] = $this->M_bkt->viewBkt();
        $this->load->view('bkt/data', $data);
    }


    public function tambah()
    {
        $kodeunik1 = $this->M_bkt->buat_kode_bank();
        $data['kodebank'] = $this->M_bkt->buat_kode_bank();
        $data['kodekas'] = $this->M_bkt->buat_kode_kas();
        $validation = $this->form_validation; 
        $validation->set_rules('no_dok', 'no_dok', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('kd_bank', 'Kd_bank', 'required');
        $validation->set_rules('penerimaan', 'penerimaan', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('selisih', 'selisih', 'required');
        $validation->set_rules('ket', 'ket', 'required');

        if($validation->run() == FALSE) 
        {

            $this->load->view('bkt/tambah', $data);

        } else {

          $this->M_bkt->tambahBkt();
          // $url = "http://localhost/body-repair/spk/ubah/$kodeunik1";
          // $url = "http://103.57.9.39/body-repair/spk/ubah/$kodeunik1";
          redirect('bkt');

        }
    }

    public function hapus($no_est)
    {

        $this->M_spk->hapus($no_est);
        redirect('spk');
    }

    public function updateStatus($no_est)
    {
        $this->M_spk->updateStatus($no_est);
        redirect('spk');
    }

    public function statusFinish($no_est)
    {
        $this->M_spk->statusFinish($no_est);
        redirect('spk');
    }

    public function ubah($no_dok)
    {

        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;
        $data['bkt'] = $this->M_bkt->getById($no_dok);
        $data['bank'] = $this->M_bank->viewBank();
        $kodeunik1 = $this->M_bkt->buat_kode_bank();
        $data['kodebank'] = $this->M_bkt->buat_kode_bank();
        $data['kodekas'] = $this->M_bkt->buat_kode_kas();
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

            $this->M_detail->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

    public function editstatus($no_est)
    {
          $validation = $this->form_validation; 
          $data['spk'] = $this->M_spk->getById($no_est);
          $validation->set_rules('status', 'Status', 'required');
          $validation->set_rules('mulai', 'Mulai', 'required');
          $validation->set_rules('akhir', 'Akhir', 'required');

          if ($validation->run() == FALSE) 
            {
              $this->load->view('spk/status', $data);
            } else {
              $this->M_spk->ubahStatus();
              redirect('spk');
            }
    }


    public function datainvoice()
    {
        $data['spk'] = $this->M_spk->statusSpk();
        $data['sa'] = $this->M_sa->viewSa();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $this->load->view('spk/datainvoice', $data);
    }

    public function editstatusspk($no_est)
    {
            $validation = $this->form_validation; 
            $data['spk'] = $this->M_spk->getById($no_est);


            if ($validation->run() == FALSE) 
              {
                $this->load->view('spk/editspk', $data);
              } else {
                $this->M_spk->ubahStatusspk();
                redirect('spk/statusspk');
              }
    }

//---------------------------------------------- Maintenance SPK ---------------------------------------------------------

    public function maintenance()
    {
        $data['spk'] = $this->M_spk->viewSpk();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['sa'] = $this->M_sa->viewSa();
        $this->load->view('maintenance/data', $data);
    }

    public function maintenance_ubah($no_est)
    {
        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;

        $data['kodeunik'] = $this->M_detail->buat_kode();
        $data['kodeunik1'] = $this->M_spk->ambil_kode();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['spk'] = $this->M_spk->getById($no_est);
        $data['sa'] = $this->M_sa->viewSa();

        $validation->set_rules('no_est', 'no_est', 'required');
        $validation->set_rules('no_spk', 'no_spk', 'required');
        $validation->set_rules('tgl_spk', 'Tgl_spk', 'required');
        $validation->set_rules('kd_kendaraan', 'Kd_kendaraan', 'required');
        $validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $validation->set_rules('jenis', 'Jenis', 'required');
        $validation->set_rules('kd_sa', 'Kd_sa', 'required');
        $validation->set_rules('kd_fm', 'Kd_fm', 'required');
        $validation->set_rules('vendor', 'Vendor', 'required');
        $validation->set_rules('mulai', 'Mulai', 'required');
        $validation->set_rules('akhir', 'Akhir', 'required');
        $validation->set_rules('kd_customer', 'Kd_customer', 'required');
        $validation->set_rules('kd_asuransi', 'Kd_asuransi', 'required');
        $validation->set_rules('pembayar', 'Pembayar', 'required');
        $validation->set_rules('status', 'status', 'required');
        
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');


        if ($validation->run() == FALSE) 
          {

            $this->load->view('maintenance/ubah', $data);

          } else{

            $this->M_spk->ubahM();
            redirect('spk/maintenance');

          }

    }


//------------------------------------------------- Detail Bahan --------------------------------------------------------
    public function bahan()
    {
        $data['spk'] = $this->M_spk->viewSpk();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $this->load->view('spk/bahan', $data);
    }

    public function ubahbahan($no_est)
    {

        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;

        $data['kodeunik'] = $this->M_detail->buat_kode();
        $data['kodeunik1'] = $this->M_spk->ambil_kode();
        $data['kodeunik2'] = $this->M_spk->ambil_kode_stok();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['spk'] = $this->M_spk->getById($no_est);

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
            $this->load->view('spk/detailbahan', $data);

          } else{

            $this->M_detail->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

//----------------------------------------------- Work In Progress --------------------------------------------------------
    public function wip()
    {
        $data['spk'] = $this->M_spk->viewSpk();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['sa'] = $this->M_sa->viewSa();
        $this->load->view('spk/wip', $data);
    }


//------------------------------------------------ Data Pop ---------------------------------------------------------------

    public function popasuransidata()
    {
        $data['asr'] = $this->M_asuransi->viewAsuransi();
        $this->load->view('datapop/popasuransidata', $data);
    }

    public function popbahandata()
    {
        $data['bahan'] = $this->M_bahan->viewBahan();
        $this->load->view('datapop/popbahandata', $data);
    }

    public function popcustomerdata()
    {
        $data['cst'] = $this->M_customer->viewCustomer();
        $this->load->view('datapop/popcustomerdata', $data);
    }

    public function popnopoldata()
    {
        $data['knd'] = $this->M_kendaraan->viewKendaraan();
        $this->load->view('datapop/popnopoldata', $data);
    }

    public function popsadata()
    {
        $data['sa'] = $this->M_sa->viewSa();
        $this->load->view('datapop/popsadata', $data);
    }

    public function popfmdata()
    {
        $data['fm'] = $this->M_fm->viewFm();
        $this->load->view('datapop/popfmdata', $data);
    }

    public function popjenis()
    {
      $data['jenis'] = $this->M_jenis->viewJenis(); 
      $this->load->view('datapop/popjenis', $data);
    }
    
    public function poppart()
    {
      $data['part'] = $this->M_part->viewPart(); 
      $this->load->view('datapop/poppart', $data);
    }

    public function popbank()
    {
      $data['bank'] = $this->M_bank->viewBank(); 
      $this->load->view('datapop/popbank', $data);
    }



//---------------------------------------------------- Laporan -------------------------------------------------------------
   
    public function invoice ($no_est)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation; 
        $data['kodeunik'] = $this->M_detail->buat_kode();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['dataspk'] = $this->M_spk->viewSpk();
        $data['spk'] = $this->M_spk->getById($no_est);

        if ($validation->run() == FALSE)
          {

            $this->load->view('laporan/invoice', $data);

          } else {
            
            $this->M_spk->ubahSpk();
            redirect('spk/statusspk');
          }

    }

    public function printEst ($no_est)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation; 
        $data['kodeunik'] = $this->M_detail->buat_kode();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['dataspk'] = $this->M_spk->viewSpk();
        $data['spk'] = $this->M_spk->getById($no_est);

        if ($validation->run() == FALSE) 
          {

            $this->load->view('laporan/print_est', $data);

          } else {

            $this->M_spk->ubahSpk();
            redirect('spk');

          }

    }

    public function printSpk ($no_est)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation;
        $data['kodeunik'] = $this->M_detail->buat_kode();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['dataspk'] = $this->M_spk->viewSpk();
        $data['spk'] = $this->M_spk->getById($no_est);

        if ($validation->run() == FALSE)
          {

            $this->load->view('laporan/print_spk', $data);

          } else {

            $this->M_spk->ubahSpk();
            redirect('spk');

          }
    }  

    public function printbahan ($no_est)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $validation = $this->form_validation;
        $data['kodeunik'] = $this->M_detail->buat_kode();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['dataspk'] = $this->M_spk->viewSpk();
        $data['spk'] = $this->M_spk->getById($no_est);


            $this->load->view('laporan/print_bahan', $data);

   
    }  

    public function post($no_est)
    {
        $this->M_spk->post($no_est);
        redirect('spk/bahan');
    }
}

   