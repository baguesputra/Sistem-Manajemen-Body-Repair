<?php 
class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembelian');
        $this->load->model('M_pembelianpart');
        $this->load->model('M_supplier');
        $this->load->model('M_detailpemb');
        $this->load->model('M_detailpembpart');
        $this->load->model('M_part');
        $this->load->model('M_bahan');
    }

    public function index()
    {
        $data['pembelian'] = $this->M_pembelian->viewPembelian();
        $this->load->view('pembelian/data', $data);
    }

    public function tambah()
    {
        $data['kodeunik'] = $this->M_pembelian->buat_kode();
        $kodeunik1= $this->M_pembelian->buat_kode();
        $validation = $this->form_validation; 
        $validation->set_rules('kd_pemb', 'Kd_pemb', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('tgl_pemb', 'Tgl_pemb', 'required');
        $validation->set_rules('supplier', 'supplier', 'required');
        $validation->set_rules('status', 'status', 'required');
        $validation->set_rules('posisi', 'posisi', 'required');

        if($validation->run() == FALSE) 
        {

            $this->load->view('pembelian/tambah', $data);

        } else {

          $this->M_pembelian->tambahPembelian();
          // $url = "http://localhost/body-repair/pembelian/ubah/$kodeunik1";
          $url = "http://103.57.9.39/body-repair/pembelian/ubah/$kodeunik1";
          redirect($url);

        }
    }

    public function ubah($kd_pemb)
    {
        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;

        $data['kodeunik'] = $this->M_pembelian->buat_kode();
        $data['kodeunik1'] = $this->M_detailpemb->buat_kode();
        $data['kodeunik2'] = $this->M_detailpemb->buat_kode_stok();
        $data['detailpemb'] = $this->M_detailpemb->viewDetailpemb();
        $data['pembelian'] = $this->M_pembelian->viewPembelian();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['pembelian'] = $this->M_pembelian->getById($kd_pemb);

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        $validationdetail->set_rules('kd_detail', 'kd_detail', 'required');
        $validationdetail->set_rules('kd_pemb', 'kd_pemb', 'required');
        $validationdetail->set_rules('kd_jenis', 'kd_jenis', 'required');
        $validationdetail->set_rules('jenis_pekerjaan', 'jenis_pekerjaan', 'required');
        $validationdetail->set_rules('jumlah', 'jumlah', 'required');
        $validationdetail->set_rules('diskon', 'Diskon', 'required');
        $validationdetail->set_rules('harga', 'harga', 'required');
        $validationdetail->set_rules('total', 'total', 'required');

        if ($validation->run() == FALSE)
          {
            $this->load->view('pembelian/ubah', $data);

          } else{

            $this->M_detailpemb->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

    public function hapus($kd_detail)
    {
        $this->M_detailpemb->hapus($kd_detail);
        $url = $_SERVER['HTTP_REFERER'];
        redirect($url);
    }

    public function bayar($kd_pemb)
    {
        $data['pembelian'] = $this->M_pembelian->getById($kd_pemb);
        $data['kodeunik'] = $this->M_pembelian->buat_kode_kredit();
        $data['kredit'] = $this->M_pembelian->viewKredit();
        $validation = $this->form_validation;

      
        $validation->set_rules('updated_at', 'Updated_at','required');
        $validation->set_rules('updated_by', 'Updated_by','required');
        $validation->set_rules('created_at', 'Created_at','required');
        $validation->set_rules('created_by', 'Created_by','required');

        if ($validation->run() == FALSE)
          {
            $this->load->view('pembelian/bayar', $data);

          } else {

            $this->M_pembelian->bayar();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

    public function popsupplier()
    {
        $data['supplier'] = $this->M_supplier->viewSupplier();
        $this->load->view('datapop/popsupplier', $data);
    }

    public function poppart()
    {
      $data['part'] = $this->M_part->viewPart(); 
      $this->load->view('datapop/poppartpemb', $data);
    }

    public function popbahandata()
    {
        $data['bahan'] = $this->M_bahan->viewBahan();
        $this->load->view('datapop/popbahandatapemb', $data);
    }

    public function printPemb ($kd_pemb)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $data['detail'] = $this->M_detailpemb->viewDetailpemb();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['part'] = $this->M_part->viewPart();
        $data['pemb'] = $this->M_pembelian->getById($kd_pemb);
        $data['pembelian'] = $this->M_pembelian->viewPembelian();

      

            $this->load->view('laporan/print_pemb', $data);
    }

    public function post($kd_pemb)
    {
        $this->M_detailpemb->post($kd_pemb);
        redirect('pembelian');
    }


//--------------------------------------Pembelian Part---------------------------------------------------------

    public function part()
    {
        $data['pembelian'] = $this->M_pembelianpart->viewPembelian();
        $this->load->view('pemb_part/data', $data);
    }

    public function tambahpart()
    {
        $data['kodeunik'] = $this->M_pembelianpart->buat_kode();
        $kodeunik1= $this->M_pembelianpart->buat_kode();
        $validation = $this->form_validation; 
        $validation->set_rules('kd_pemb', 'Kd_pemb', 'required');
        $validation->set_rules('tgl', 'Tgl', 'required');
        $validation->set_rules('tgl_pemb', 'Tgl_pemb', 'required');
        $validation->set_rules('supplier', 'supplier', 'required');
        $validation->set_rules('status', 'status', 'required');
        $validation->set_rules('posisi', 'posisi', 'required');

        if($validation->run() == FALSE) 
        {

            $this->load->view('pemb_part/tambah', $data);

        } else {

          $this->M_pembelianpart->tambahPembelian();
          // $url = "http://localhost/body-repair/pembelian/ubah/$kodeunik1";
          $url = "http://103.57.9.39/body-repair/pembelian/ubahpart/$kodeunik1";
          redirect($url);

        }
    }

    public function ubahpart($kd_pemb)
    {
        $validation = $this->form_validation; 
        $validationdetail = $this->form_validation;

        $data['kodeunik'] = $this->M_pembelianpart->buat_kode();
        $data['kodeunik1'] = $this->M_detailpembpart->buat_kode();
        $data['kodeunik2'] = $this->M_detailpembpart->buat_kode_stok();
        $data['detailpemb'] = $this->M_detailpembpart->viewDetailpemb();
        $data['pembelian'] = $this->M_pembelianpart->viewPembelian();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['pembelian'] = $this->M_pembelianpart->getById($kd_pemb);

        $validation->set_rules('created_at', 'Created_at', 'required');
        $validation->set_rules('created_by', 'Created_by', 'required');
        $validation->set_rules('updated_at', 'Updated_at', 'required');
        $validation->set_rules('updated_by', 'Updated_by', 'required');

        $validationdetail->set_rules('kd_detail', 'kd_detail', 'required');
        $validationdetail->set_rules('kd_pemb', 'kd_pemb', 'required');
        $validationdetail->set_rules('kd_jenis', 'kd_jenis', 'required');
        $validationdetail->set_rules('jenis_pekerjaan', 'jenis_pekerjaan', 'required');
        $validationdetail->set_rules('jumlah', 'jumlah', 'required');
        $validationdetail->set_rules('diskon', 'Diskon', 'required');
        $validationdetail->set_rules('diskonRp', 'DiskonRp', 'required');
        $validationdetail->set_rules('harga', 'harga', 'required');
        $validationdetail->set_rules('total', 'total', 'required');

        if ($validation->run() == FALSE)
          {
            $this->load->view('pemb_part/ubah', $data);

          } else{

            $this->M_detailpembpart->tambahDetail();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

    public function hapuspart($kd_detail)
    {
        $this->M_detailpemb->hapus($kd_detail);
        $url = $_SERVER['HTTP_REFERER'];
        redirect($url);
    }

    public function bayarpart($kd_pemb)
    {
        $data['pembelian'] = $this->M_pembelianpart->getById($kd_pemb);
        $data['kodeunik'] = $this->M_pembelianpart->buat_kode_kredit();
        $data['kredit'] = $this->M_pembelianpart->viewKredit();
        $validation = $this->form_validation;

      
        $validation->set_rules('updated_at', 'Updated_at','required');
        $validation->set_rules('updated_by', 'Updated_by','required');
        $validation->set_rules('created_at', 'Created_at','required');
        $validation->set_rules('created_by', 'Created_by','required');

        if ($validation->run() == FALSE)
          {
            $this->load->view('pemb_part/bayar', $data);

          } else {

            $this->M_pembelianpart->bayar();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);

          }
    }

   

    public function printPembpart($kd_pemb)
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %a";
        $data['detail'] = $this->M_detailpembpart->viewDetailpemb();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $data['part'] = $this->M_part->viewPart();
        $data['pemb'] = $this->M_pembelianpart->getById($kd_pemb);
        $data['pembelian'] = $this->M_pembelianpart->viewPembelian();

      

            $this->load->view('laporan/print_pemb', $data);
    }

    public function postpart($kd_pemb)
    {
        $this->M_detailpembpart->post($kd_pemb);
        redirect('pembelian/part');
    }


}