<?php 
class Pengeluaran extends CI_Controller
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
    }

    public function index()
    {
        $data['spk'] = $this->M_spk->viewSpk();
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $this->load->view('pengeluaran/data', $data);
    }

    public function printPeng($no_est)
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
      $data['bahan'] = $this->M_bahan->viewBahan();
      $data['part'] = $this->M_part->viewPart();
      $data['dataspk'] = $this->M_spk->viewSpk();
      $data['spk'] = $this->M_spk->getById($no_est);

      if ($validation->run() == FALSE) 
        {

          $this->load->view('laporan/print_peng', $data);

        } else {

          $this->M_spk->ubahSpk();
          redirect('pengeluaran');

        }
    }



}