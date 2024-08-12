<?php
class M_pembelian extends CI_Model
{
    private $_table = "pembelian";
    private $table_kredit = "kredit_detail";

    public function viewPembelian()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function viewKredit()
    {
        return $this->db->get($this->table_kredit)->result_array();
    }

    public function tambahPembelian()
    {
        $data = array(
            'kd_pemb' => $this->input->post('kd_pemb', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_pemb' => $this->input->post('tgl_pemb', true),
            'supplier' => $this->input->post('supplier', true),
            'status' => $this->input->post('status', true),
            'total' => $this->input->post('bayar', true),
            'tgl_tempo' => $this->input->post('tgl_tempo', true),
            'sisa' => $this->input->post('sisa', true),
            'posisi' => $this->input->post('posisi', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function getById($kd_pemb)
    {
        return $this->db->get_where($this->_table, ['kd_pemb' => $kd_pemb])->row_array();
    }

    public function tambahDetail()
    {
        $data = array(
          'kd_detail' => $this->input->post('kd_detail', true),
          'no_spk' => $this->input->post('no_spk', true),
          'kd_jenis' => $this->input->post('kd_jenis', true),
          'jumlah' => $this->input->post('jumlah', true),
          'harga' => $this->input->post('harga', true),
          'diskon' => $this->input->post('diskon', true),
          'total' => $this->input->post('total', true),

          'created_by' => $this->input->post('created_by', true),
          'created_at' => $this->input->post('created_at', true),
          'updated_by' => $this->input->post('updated_by', true),
          'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function bayar()
    {

      $data = array(
        'kd_kredit' => $this->input->post('kd_kredit', true),
        'kd_pemb' => $this->input->post('kd_pemb', true),
        'tgl_bayar' => $this->input->post('tgl_bayar', true),
        'bayar' => $this->input->post('bayar', true),

        'created_by' => $this->input->post('created_by', true),
        'created_at' => $this->input->post('created_at', true),
        'updated_by' => $this->input->post('updated_by', true),
        'updated_at' => $this->input->post('updated_at', true),
      );
      $this->db->insert($this->table_kredit, $data);


        $data = array(
          'sisa' => $this->input->post('sisa3'),
  
          'updated_by' => $this->input->post('updated_by', true),
          'updated_at' => $this->input->post('updated_at', true),
       
        );
        $this->db->where('kd_pemb', $this->input->post('kd_pemb'));
        $this->db->update($this->_table, $data);

       
    }

    public function buat_kode()   
    {

        $this->db->select('RIGHT(pembelian.kd_pemb,6) as kd_pemb', FALSE);
        $this->db->order_by('created_at','DESC');
        $this->db->limit(1);
        $query = $this->db->get('pembelian');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kd_pemb) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "PMB-23-".$kodemax;    
        return $kodejadi;
    }

    public function buat_kode_kredit()   
    {

        $this->db->select('RIGHT(kredit_detail.kd_kredit,4) as kd_kredit', FALSE);
        $this->db->order_by('kd_kredit','DESC');
        $this->db->limit(1);
        $query = $this->db->get('kredit_detail');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kd_kredit) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
        $kodejadi = "KR-".$kodemax;    
        return $kodejadi;
    }




}