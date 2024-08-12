<?php
class M_bbkt extends CI_Model
{
    private $table_bbt = "bbt";
    private $table_bkt = "bkt";
    private $table_detail = "detail_bbkt";

//-----------------------------------------------------Bank Terima------------------------------------------------------
    public function viewbbt()
    {
        return $this->db->get($this->table_bbt)->result_array();
    }

    public function viewdetailBbkt()
    {
        return $this->db->get($this->table_detail)->result_array();
    }

    public function tambahbbt()
    {
        $data = array(
            'no_dok' => $this->input->post('no_dok', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_terima' => $this->input->post('tgl', true),
            'gl_account' => $this->input->post('gl_account', true),
            'kode_cust' => $this->input->post('kode_cust', true),
            'customer' => $this->input->post('customer', true),
            'tipe' => $this->input->post('tipe', true),
            'kd_bank' => $this->input->post('kd_bank', true),
            'penerimaan' => $this->input->post('penerimaan', true),
            'jumlah' => $this->input->post('jumlah', true),
            'selisih' => $this->input->post('selisih', true),
            'ket' => $this->input->post('ket', true),
            'status' => '0',

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->table_bbt, $data);
    }

    public function hapus($no_est)
    {
        $this->db->where('no_est', $no_est);
        $this->db->delete($this->table_bbt);
    }

    public function tambahDetail()
    {
		$data = array(
			'kode' => $this->input->post('kode', true),
			'kode_bbkt' => $this->input->post('no_dok', true),
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

    public function hapusDetail($kode)
	{
		$this->db->where('kode', $kode);
		$this->db->delete($this->table_detail);
	}

    public function posting($no_dok)
    {
        $data = array(
          'status' => '1',
         
        );
        $this->db->where('no_dok', $no_dok);
        $this->db->update($this->table_bbt, $data);
    }

    public function getById($no_dok)
    {
        return $this->db->get_where($this->table_bbt, ['no_dok' => $no_dok])->row_array();
    }


    public function buat_kode_bbt()   
    {

        $this->db->select('RIGHT(bbt.no_dok,6) as no_dok', FALSE);
        $this->db->order_by('no_dok','DESC');
        $this->db->limit(1);
        $query = $this->db->get('bbt');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_dok) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "BBT-23-".$kodemax;    
        return $kodejadi;
    }

    public function buat_kode_detail_bbkt()   
    {

        $this->db->select('RIGHT(detail_bbkt.kode,6) as kode', FALSE);
        $this->db->order_by('kode','DESC');
        $this->db->limit(1);
        $query = $this->db->get('detail_bbkt');     
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
        $this->db->insert($this->table_bbt, $data);
    }

    public function cetakMonthly($tgl_awal,$tgl_akhir)
    {
        // return $this->_table->where('tgl_spk >=', $tgl_awal)->where('tgl_spk',$tgl_akhir)->get();
        // $query = $this->db->query
        // ("SELECT * FROM tr_spk where tgl_spk BETWEEN '$tgl_awal' and '$tgl_akhir' ORDER BY tgl_spk ASC");
        // return $query->result();

        // $this->db->where('tgl_spk >=',$tgl_awal); 
        // $this->db->where('tgl_spk >=',$tgl_awal);
        // return $this->db->get('tr_spk');

         $this->db->where("tgl_spk BETWEEN '$tgl_awal' AND '$tgl_akhir'");
          return $this->db->get('tr_spk');
    }



//----------------------------------------------------Kas Terima---------------------------------------------------------



   public function viewBkt()
    {
        return $this->db->get($this->table_bkt)->result_array();
    }

    public function tambahBkt()
    {
        $data = array(
            'no_dok' => $this->input->post('no_dok', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_terima' => $this->input->post('tgl', true),
            'gl_account' => $this->input->post('gl_account', true),
            'kode_cust' => $this->input->post('kode_cust', true),
            'customer' => $this->input->post('customer', true),
            'tipe' => $this->input->post('tipe', true),
            'kd_bank' => $this->input->post('kd_bank', true),
            'penerimaan' => $this->input->post('penerimaan', true),
            'jumlah' => $this->input->post('jumlah', true),
            'selisih' => $this->input->post('selisih', true),
            'ket' => $this->input->post('ket', true),
            'status' => '0',

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->table_bkt, $data);
    }

    public function ubahBkt()
    {
        $data = array(
            'no_dok' => $this->input->post('no_dok', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_terima' => $this->input->post('tgl', true),
            'kode_cust' => $this->input->post('kode_cust', true),
            'customer' => $this->input->post('customer', true),
            'tipe' => $this->input->post('tipe', true),
            'kd_bank' => $this->input->post('kd_bank', true),
            'penerimaan' => $this->input->post('penerimaan', true),
            'jumlah' => $this->input->post('jumlah', true),
            'selisih' => $this->input->post('selisih', true),
            'ket' => $this->input->post('ket', true),

           
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->where('no_dok', $this->input->post('no_dok'));
        $this->db->update($this->table_bkt, $data);
    }


    public function getByIdBkt($no_dok)
    {
        return $this->db->get_where($this->table_bkt, ['no_dok' => $no_dok])->row_array();
    }

    public function ubahSpk()
    {
        $data = array(
        
          'tgl_spk' => $this->input->post('tgl_spk'),
          'kd_kendaraan' => $this->input->post('kd_kendaraan'),
          'pekerjaan' => $this->input->post('pekerjaan'),
          'jenis' => $this->input->post('jenis'),
          'kd_sa' => $this->input->post('kd_sa'),
          'kd_fm' => $this->input->post('kd_fm'),
          'vendor' => $this->input->post('vendor'),
          'mulai' => $this->input->post('mulai'),
          'akhir' => $this->input->post('akhir'),
          'kd_customer' => $this->input->post('kd_customer'),
          'kd_asuransi' => $this->input->post('kd_asuransi'),
          'pembayar' => $this->input->post('pembayar'),
          'status' => $this->input->post('status'),

          'updated_by' => $this->input->post('updated_by', true),
        'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->where('no_est', $this->input->post('no_est'));
        $this->db->update($this->table_bkt, $data);
    }


    public function postingBkt($no_dok)
    {
        $data = array(
          'status' => '1',
         
        );
        $this->db->where('no_dok', $no_dok);
        $this->db->update($this->table_bkt, $data);
    }

    public function ubahStatusspk()
    {
        $data = array(
          'status' => $this->input->post('status'),
        );
        $this->db->where('no_est', $this->input->post('no_est'));
        $this->db->update($this->table_bkt, $data);
    }

    public function statusSpk()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function buat_kode_bkt()   
    {

        $this->db->select('RIGHT(bkt.no_dok,6) as no_dok', FALSE);
        $this->db->order_by('no_dok','DESC');
        $this->db->limit(1);
        $query = $this->db->get('bkt');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_dok) + 1;
          } else {
            $kode = 1;
          }     
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "BKT-23-".$kodemax;    
        return $kodejadi;
    }

}