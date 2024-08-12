<?php

class Detail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_detail');
        $this->load->model('M_jenis');
        $this->load->model('M_spk');
    }



    // public function tambah()
    // {
    //     $data['kodeunik'] = $this->M_detail->buat_kode(); // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
    //     $data['kodeunik1'] = $this->M_spk->ambil_kode(); // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
    //     $data['detail'] = $this->M_detail->dataDetail();
    //     $data['jenis'] = $this->M_jenis->viewJenis();
    //     $validation = $this->form_validation; //untuk menghemat penulisan kode

    //     $validation->set_rules('kd_detail', 'kd_detail', 'required');
    //     $validation->set_rules('no_spk', 'no_spk', 'required');
    //     $validation->set_rules('kd_jenis', 'kd_jenis', 'required');
    //     $validation->set_rules('jumlah', 'jumlah', 'required');
    //     $validation->set_rules('harga', 'harga', 'required');
    //     $validation->set_rules('diskon', 'diskon', 'required');
    //     $validation->set_rules('total', 'total', 'required');



    //     if($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
    //     {
    //       $this->load->view('spk/ubah', $data);
    //     } else {
    //       $this->M_detail->tambahDetail();
    //       $url = $_SERVER['HTTP_REFERER'];
    //       redirect($url);
    //     }
    // }

    public function ubah()
    {
        $data['detail'] = $this->M_detail->dataDetail();
        $data['kodeunik'] = $this->M_detail->buat_kode();
        $data['jenis'] = $this->M_jenis->viewJenis();
        $validation = $this->form_validation;

        $validation->set_rules('kd_detail', 'kd_detail', 'required');
        $validation->set_rules('no_spk', 'no_spk', 'required');
        $validation->set_rules('kd_jenis', 'kd_jenis', 'required');
        $validation->set_rules('jumlah', 'jumlah', 'required');
        $validation->set_rules('harga', 'harga', 'required');
        $validation->set_rules('diskon', 'diskon', 'required');
        $validation->set_rules('total', 'total', 'required');

        if($validation->run() == FALSE) 
        {
          $this->load->view('detail/ubah', $data);
        } else {
          $this->M_detail->tambahDetail();
          $url = $_SERVER['HTTP_REFERER'];
          redirect($url);
        }
    }


    public function hapus($kd_detail)
    {
        $this->M_detail->hapus($kd_detail);
        $url = $_SERVER['HTTP_REFERER'];
        redirect($url);
    }

    public function balik()
    {
      $this->M_spk->tambahSpk();
      redirect('spk/tambah', $data);
    }

}
