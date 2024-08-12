<?php
class M_detail extends CI_Model
{
    private $_table = "tr_spk_detail";
	private $table_part = "ms_part";
	private $table_bahan = "ms_bahan";
	private $table_stok = "stok_detail";
	private $table_spk = "tr_spk";
	private $table_history = "history";

	public function dataDetail()
	{
		return $this->db->get($this->_table)->result_array();
	}

	public function getById($kd_detail)
	{
		return $this->db->get_where($this->_table, ['kd_detail' => $kd_detail])->row_array();
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

		$data = array(
			
			'stok' => $this->input->post('jumlah3', true),
			
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
        $this->db->where('kd_part', $this->input->post('kd_jenis'));
        $this->db->update($this->table_part, $data);

		// $data = array(
			
		// 	'total' => $this->input->post('ttl2', true),
			
		// 	'updated_by' => $this->input->post('updated_by', true),
		// 	'updated_at' => $this->input->post('updated_at', true),
		// );
        // $this->db->where('no_est', $this->input->post('no_est'));
        // $this->db->update($this->table_spk, $data);

		$data = array(
			
			'jumlah' => $this->input->post('jumlah3', true),
			
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
        $this->db->where('kd_bahan', $this->input->post('kd_jenis'));
        $this->db->update($this->table_bahan, $data);

		$data = array(
			'kd_detail' => $this->input->post('kd_stok', true),
			'kd_jenis' => $this->input->post('kd_jenis', true),
			'nama' => $this->input->post('jenis_pekerjaan', true),
			'jumlah' => $this->input->post('jumlah', true),
			'harga' => $this->input->post('harga', true),
			'total' => $this->input->post('total', true),
			'tipe' => $this->input->post('tipe', true),

			'created_by' => $this->input->post('created_by', true),
			'created_at' => $this->input->post('created_at', true),
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
		$this->db->insert($this->table_stok, $data);

		$tgl_now = Date('Y-m-d\TH:i:s',time());
		$kode_jenis = $this->input->post('kd_jenis', true);
		$kode_detail = $this->input->post('kd_stok', true);
		$est = $this->input->post('no_spk', true);
        $data = array(
          'modul' => 'Tambah Jasa atau Part',
          'ket' => "Tambah item $kode_jenis dengan kode detail $kode_detail pada data SPK no $est",

          'created_by' => $this->session->userdata("username"),
          'created_at' => $tgl_now,
        );
        $this->db->insert($this->table_history, $data);
    }

	public function ubahDetail()
    {
		$data = array(
			'kd_detail' => $this->input->post('kd_detail', true),
			'no_spk' => $this->input->post('no_spk', true),
			'kd_jenis' => $this->input->post('kd_jenis', true),
			'jumlah' => $this->input->post('jumlah', true),
			'harga' => $this->input->post('harga', true),
			'diskon' => $this->input->post('diskon', true),
			'total' => $this->input->post('total', true),
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
		$this->db->where('kd_detail', $this->input->post('kd_detail'));
		$this->db->update($this->_table, $data);
    }


    public function buat_kode()  
	{

		$this->db->select('RIGHT(tr_spk_detail.kd_detail,4) as kd_detail', FALSE);
		$this->db->order_by('kd_detail','DESC');
		$this->db->limit(1);
		$query = $this->db->get('tr_spk_detail');      //cek dulu apakah ada sudah ada kode di tabel.
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
		$kodejadi = "D-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
    }

	public function hapus($kd_detail)
	{
		
		$this->db->where('kd_detail', $kd_detail);
		$q = $this->db->get('tr_spk_detail')->row();
		$data_no_spk = $q->no_spk;
		$kode_jenis = $q->kd_jenis;
		$tgl_now = Date('Y-m-d\TH:i:s',time());
		$data = array(
			'modul' => 'Hapus Detail',
			'ket' => "Hapus Jasa / Part $kode_jenis dokumen detail $kd_detail pada spk $data_no_spk",
  
			'created_by' => $this->session->userdata("username"),
			'created_at' => $tgl_now,
		  );
		  $this->db->insert($this->table_history, $data);

		$this->db->where('kd_detail', $kd_detail);
		$this->db->delete($this->_table);


	}


}
