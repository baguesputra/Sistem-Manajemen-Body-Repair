<?php
class M_detailpeng extends CI_Model
{
    private $_table = "peng_detail";
    private $table_bahan = "ms_bahan";
    private $table_part = "ms_part";
    private $table_spk = "spk";

    public function viewDetailpemb()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahPembelian()
    {
        $data = array(
            'kd_pemb' => $this->input->post('kd_pemb', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_pemb' => $this->input->post('tgl_pemb', true),
            'supplier' => $this->input->post('supplier', true),
            'status' => $this->input->post('status', true),

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
			'kd_pemb' => $this->input->post('kd_pemb', true),
			'kd_jenis' => $this->input->post('kd_jenis', true),
            'nama' => $this->input->post('jenis_pekerjaan', true),
			'jumlah' => $this->input->post('stok', true),
			'harga' => $this->input->post('harga', true),
			'total' => $this->input->post('total', true),

			'created_by' => $this->input->post('created_by', true),
			'created_at' => $this->input->post('created_at', true),
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
		$this->db->insert($this->_table, $data);

        $data = array(
			
			'jumlah' => $this->input->post('jumlah', true),
			
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
        $this->db->where('kd_bahan', $this->input->post('kd_jenis'));
        $this->db->update($this->table_bahan, $data);

        $data = array(
			
			'stok' => $this->input->post('jumlah', true),
			
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
        $this->db->where('kd_part', $this->input->post('kd_jenis'));
        $this->db->update($this->table_part, $data);

        $data = array(
			
			'total' => $this->input->post('bayar2', true),
			
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
        $this->db->where('kd_pemb', $this->input->post('kd_pemb'));
        $this->db->update($this->table_pemb, $data);
    }

    public function hapus($kd_jenis)
	{
		$this->db->where('kd_jenis', $kd_jenis);
		$this->db->delete($this->_table);
	}

    public function buat_kode()   
    {

      $this->db->select('RIGHT(pemb_detail.kd_detail,4) as kd_detail', FALSE);
      $this->db->order_by('kd_detail','DESC');
      $this->db->limit(1);
      $query = $this->db->get('pemb_detail');      //cek dulu apakah ada sudah ada kode di tabel.
      if($query->num_rows() <> 0){
      //jika kode ternyata sudah ada.
      $data = $query->row();
      $kode = intval($data->kd_detail) + 1;
      }
      else {
      //jika kode belum ada
      $kode = 1;
      }
  
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
      $kodejadi = "DP-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
      return $kodejadi;
    }




}