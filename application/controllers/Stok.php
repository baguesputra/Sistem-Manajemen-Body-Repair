<?php

class Stok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jenis');
        $this->load->model('M_part');
        $this->load->model('M_bahan');
        $this->load->model('M_stok');
    }

    public function index()
    {
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $this->load->view('stok/data', $data);
    }

    public function bahan()
    {
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $this->load->view('stok/databahan', $data);
    }

    public function part()
    {
        $data['jenis'] = $this->M_jenis->viewJenis();
        $data['part'] = $this->M_part->viewPart();
        $data['bahan'] = $this->M_bahan->viewBahan();
        $this->load->view('stok/datapart', $data);
    }


    public function kartubahan($kd_bahan)
    {
        $data['bahan'] = $this->M_bahan->getById($kd_bahan);
        $data['stok'] = $this->M_stok->viewStok();
        $this->load->view('stok/detailbahan', $data);
    }

    public function kartupart($kd_part)
    {
        $data['part'] = $this->M_part->getById($kd_part);
        $data['stok'] = $this->M_stok->viewStok();
        $this->load->view('stok/detailpart', $data);
    }
 

    

}
