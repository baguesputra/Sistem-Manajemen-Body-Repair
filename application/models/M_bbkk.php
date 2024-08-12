<?php
class M_bbkk extends CI_Model
{
    private $table_bbk = "bbk";
    private $table_bkk = "bkk";
    private $table_detail = "detail_bbkk";

//-------------------------------------------------------Bank Keluar-----------------------------------------------------

    public function viewBbk()
    {
        return $this->db->get($this->table_bbk)->result_array();
    }

    public function viewdetailBbkk()
    {
        return $this->db->get($this->table_detail)->result_array();
    }

    public function tambahBbk()
    {
        $data = array(
            'no_dok' => $this->input->post('no_dok', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_terima' => $this->input->post('tgl', true),
            'gl_account' => $this->input->post('gl_account', true),
            'kode_pemasok' => $this->input->post('kode_pemasok', true),
            'pemasok' => $this->input->post('pemasok', true),
            'tipe' => $this->input->post('tipe', true),
            'kd_bank' => $this->input->post('kd_bank', true),
            'bayar' => $this->input->post('bayar', true),
            'jumlah' => $this->input->post('jumlah', true),
            'selisih' => $this->input->post('selisih', true),
            'ket' => $this->input->post('ket', true),
            'status' => '0',

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->table_bbk, $data);
    }

    public function hapusBbk($no_est)
    {
        $this->db->where('no_est', $no_est);
        $this->db->delete($this->_table);
    }

    public function tambahDetail()
    {
		$data = array(
			'kode' => $this->input->post('kode', true),
			'kode_bbkk' => $this->input->post('no_dok', true),
			'no_inv' => $this->input->post('no_inv', true),
			'tgl' => $this->input->post('tgl', true),
			'tgl_tempo' => $this->input->post('tgl_tempo', true),
      'total' => $this->input->post('total', true),
      'ket' => $this->input->post('keterangan', true),
      'gl_account' => $this->input->post('gl_account', true),

			'created_by' => $this->input->post('created_by', true),
			'created_at' => $this->input->post('created_at', true),
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
		$this->db->insert($this->table_detail, $data);
	
    }

    public function getByIdBbk($no_dok)
    {
        return $this->db->get_where($this->table_bbk, ['no_dok' => $no_dok])->row_array();
    }

    public function postingBbk($no_dok)
    {
        $data = array(
          'status' => '1',
         
        );
        $this->db->where('no_dok', $no_dok);
        $this->db->update($this->table_bbk, $data);
    }  

    public function buat_kode_bbk()   
    {

        $this->db->select('RIGHT(bbk.no_dok,6) as no_dok', FALSE);
        $this->db->order_by('no_dok','DESC');
        $this->db->limit(1);
        $query = $this->db->get('bbk');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_dok) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "BBK-23-".$kodemax;    
        return $kodejadi;
    }

    public function buat_kode_detail_bbkk()   
    {

        $this->db->select('RIGHT(detail_bbkk.kode,6) as kode', FALSE);
        $this->db->order_by('kode','DESC');
        $this->db->limit(1);
        $query = $this->db->get('detail_bbkk');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "DTL-23-".$kodemax;    
        return $kodejadi;
    }

    public function filter()
    {
        $this->db->insert($this->_table, $data);
    }

    public function cetakMonthly($tgl_awal,$tgl_akhir)
    {
        $this->db->where("tgl_spk BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        return $this->db->get('tr_spk');
    }


//----------------------------------------------------Kas Keluar---------------------------------------------------------


    public function viewBkk()
    {
        return $this->db->get($this->table_bkk)->result_array();
    }

    public function tambahBkk()
    {
        $data = array(
            'no_dok' => $this->input->post('no_dok', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_terima' => $this->input->post('tgl', true),
            'gl_account' => $this->input->post('gl_account', true),
            'kode_pemasok' => $this->input->post('kode_pemasok', true),
            'pemasok' => $this->input->post('pemasok', true),
            'tipe' => $this->input->post('tipe', true),
            'kd_bank' => $this->input->post('kd_bank', true),
            'bayar' => $this->input->post('bayar', true),
            'jumlah' => $this->input->post('jumlah', true),
            'selisih' => $this->input->post('selisih', true),
            'ket' => $this->input->post('ket', true),
            'status' => '0',

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->table_bkk, $data);
    }

    public function ubahBkk()
    {
        $data = array(
          'no_dok' => $this->input->post('no_dok', true),
          'tgl' => $this->input->post('tgl', true),
          'tgl_terima' => $this->input->post('tgl', true),
          'kode_pemasok' => $this->input->post('kode_pemasok', true),
          'pemasok' => $this->input->post('pemasok', true),
          'tipe' => $this->input->post('tipe', true),
          'kd_bank' => $this->input->post('kd_bank', true),
          'bayar' => $this->input->post('bayar', true),
          'jumlah' => $this->input->post('jumlah', true),
          'selisih' => $this->input->post('selisih', true),
          'ket' => $this->input->post('ket', true),

           
          'updated_by' => $this->input->post('updated_by', true),
          'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->where('no_dok', $this->input->post('no_dok'));
        $this->db->update($this->table_bkk, $data);
    }

    public function postingBkk($no_dok)
    {
        $data = array(
          'status' => '1',
         
        );
        $this->db->where('no_dok', $no_dok);
        $this->db->update($this->table_bkk, $data);
    }  

    public function getByIdBkk($no_dok)
    {
        return $this->db->get_where($this->table_bkk, ['no_dok' => $no_dok])->row_array();
    }

    public function buat_kode_bkk()   
    {

        $this->db->select('RIGHT(bkk.no_dok,6) as no_dok', FALSE);
        $this->db->order_by('no_dok','DESC');
        $this->db->limit(1);
        $query = $this->db->get('bkk');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_dok) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "BKK-23-".$kodemax;    
        return $kodejadi;
    }
}