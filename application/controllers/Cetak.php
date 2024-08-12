<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_bahan');
        $this->load->model('M_part');
        $this->load->model('M_auth');
        $this->load->model('M_spk');
        $this->load->model('M_kendaraan');
        $this->load->model('M_asuransi');
        $this->load->model('M_customer');
        $this->load->model('M_sa');
        $this->load->model('M_fm');
        $this->load->model('M_detail');
        $this->load->model('M_jenis');
    }

    public function index()
    {
        $this->load->view('cetak/bln_monthly');
    }

    public function bahan()
    { 
        $this->load->view('cetak/bln_bahan');
    }

    public function part()
    {
        $this->load->view('cetak/bln_part');
    }

    public function jasa()
    {
        $this->load->view('cetak/bln_jasa');
    }

    public function incentive()
    {
        $this->load->view('cetak/bln_incentive');
    }

    public function invoice()
    {
        $this->load->view('cetak/bln_invoice');
    }

    public function printMontly(){
        $this->load->view('laporan/');
    }

  
    public function cetakMonthly()
    {
       
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['detail'] = $this->M_detail->dataDetail();
      
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['spk'] = $this->M_spk->cetakMonthly($tgl_awal, $tgl_akhir);
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['tgl_awal'] = $this->input->post('tgl_awal');


        $this->load->view('laporan/monthly_invoice', $data);

    }

    public function cetakIncentive()
    {
       
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['spk'] = $this->M_spk->cetakMonthly($tgl_awal, $tgl_akhir);
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['tgl_awal'] = $this->input->post('tgl_awal');

        $data['totaljasa'] = $this->M_spk->totalJasa();



        $this->load->view('laporan/print_monthly_incentive', $data);

    }

    public function cetakInvoice()
    {
       
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['sa'] = $this->M_sa->viewSa();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['spk'] = $this->M_spk->cetakInvoice($tgl_awal, $tgl_akhir);
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['tgl_awal'] = $this->input->post('tgl_awal');

        $data['totaljasa'] = $this->M_spk->totalJasa();



        $this->load->view('laporan/print_monthly_invoice', $data);

    }

    public function cetakQuery()
    {
       
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['sa'] = $this->M_sa->viewSa();
        $data['foreman'] = $this->M_fm->viewFm();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['spk'] = $this->M_spk->cetakMonthly($tgl_awal, $tgl_akhir);
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['tgl_awal'] = $this->input->post('tgl_awal');

        $data['totaljasa'] = $this->M_spk->totalJasa();



        $this->load->view('laporan/print_query', $data);

    }

    public function cetakPart()
    {
       
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['part'] = $this->M_part->viewPart();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['spk'] = $this->M_spk->cetakPart($tgl_awal, $tgl_akhir);
        $data['dataspk'] = $this->M_spk->viewSpk();
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['tgl_awal'] = $this->input->post('tgl_awal');


        $this->load->view('laporan/print_monthly_part', $data);

    }

    public function cetakBahan()
    {
       
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['part'] = $this->M_part->viewPart();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['spk'] = $this->M_spk->cetakBahan($tgl_awal, $tgl_akhir);
        $data['dataspk'] = $this->M_spk->viewSpk();
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['tgl_awal'] = $this->input->post('tgl_awal');


        $this->load->view('laporan/print_monthly_bahan', $data);

    }

    public function cetakJasa()
    {
       
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['kendaraan'] = $this->M_kendaraan->viewKendaraan();
        $data['asuransi'] = $this->M_asuransi->viewAsuransi();
        $data['customer'] = $this->M_customer->viewCustomer();
        $data['part'] = $this->M_part->viewPart();
        $data['detail'] = $this->M_detail->dataDetail();
        $data['serviceadvisor'] = $this->M_sa->viewSa();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['spk'] = $this->M_spk->cetakJasa($tgl_awal, $tgl_akhir);
        $data['dataspk'] = $this->M_spk->viewSpk();
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['tgl_awal'] = $this->input->post('tgl_awal');


        $this->load->view('laporan/print_monthly_jasa', $data);

    }

}