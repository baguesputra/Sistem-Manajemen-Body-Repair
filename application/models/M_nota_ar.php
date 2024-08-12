<?php
class M_nota_ar extends CI_Model
{
    private $_table = "nota_debit_ar";
    private $_table2 = "nota_kredit_ar";
    private $__table = "detail_nota_ar";

    public function viewNotaAr()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function viewNotaKreditAr()
    {
        return $this->db->get($this->_table2)->result_array();
    }

    public function viewdetailNotaAr()
    {
        return $this->db->get($this->__table)->result_array();
    }

    public function tambahNotaAr()
    {
        $data = array(
            'no_dok' => $this->input->post('no_dok', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_gl' => $this->input->post('tgl_gl', true),
            'kode_cust' => $this->input->post('kode_cust', true),
            'customer' => $this->input->post('customer', true),
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
        $this->db->insert($this->_table, $data);
    }

    public function tambahNotaKreditAr()
    {
        $data = array(
            'no_dok' => $this->input->post('no_dok', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_gl' => $this->input->post('tgl_gl', true),
            'kode_cust' => $this->input->post('kode_cust', true),
            'customer' => $this->input->post('customer', true),
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
        $this->db->insert($this->_table2, $data);
    }

    public function hapus($no_est)
    {
        $this->db->where('no_est', $no_est);
        $this->db->delete($this->_table);
    }

    public function tambahDetail()
    {
		$data = array(
			'kode' => $this->input->post('kode', true),
			'kode_nota' => $this->input->post('no_dok', true),
			'no_inv' => $this->input->post('no_inv', true),
			'tgl' => $this->input->post('tgl', true),
			'tgl_gl' => $this->input->post('tgl_gl', true),
      'ket' => $this->input->post('keterangan', true),

			'created_by' => $this->input->post('created_by', true),
			'created_at' => $this->input->post('created_at', true),
			'updated_by' => $this->input->post('updated_by', true),
			'updated_at' => $this->input->post('updated_at', true),
		);
		$this->db->insert($this->__table, $data);
	
    }

    public function getById($no_dok)
    {
        return $this->db->get_where($this->_table, ['no_dok' => $no_dok])->row_array();
    }

    public function getById2($no_dok)
    {
        return $this->db->get_where($this->_table2, ['no_dok' => $no_dok])->row_array();
    }


  
    public function postingNotaDebit($no_dok)
    {
        $data = array(
          'status' => '1',
         
        );
        $this->db->where('no_dok', $no_dok);
        $this->db->update($this->_table, $data);
    }

    public function postingNotaKredit($no_dok)
    {
        $data = array(
          'status' => '1',
         
        );
        $this->db->where('no_dok', $no_dok);
        $this->db->update($this->_table2, $data);
    }

    public function buat_kode_nota_ar()   
    {

        $this->db->select('RIGHT(nota_debit_ar.no_dok,6) as no_dok', FALSE);
        $this->db->order_by('no_dok','DESC');
        $this->db->limit(1);
        $query = $this->db->get('nota_debit_ar');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_dok) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "NDR-23-".$kodemax;    
        return $kodejadi;
    }

    public function buat_kode_nota_kredit_ar()   
    {

        $this->db->select('RIGHT(nota_kredit_ar.no_dok,6) as no_dok', FALSE);
        $this->db->order_by('no_dok','DESC');
        $this->db->limit(1);
        $query = $this->db->get('nota_kredit_ar');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_dok) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "NKR-23-".$kodemax;    
        return $kodejadi;
    }

    public function buat_kode_detail_nota_ar()   
    {
        $this->db->select('RIGHT(detail_nota_ar.kode,6) as kode', FALSE);
        $this->db->order_by('kode','DESC');
        $this->db->limit(1);
        $query = $this->db->get('detail_nota_ar');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "DTL-22-".$kodemax;    
        return $kodejadi;
    }

    public function filter()
    {
        $this->db->insert($this->_table, $data);
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

    public function cetakPart($tgl_awal,$tgl_akhir)
    {
         $this->db->where("tgl_spk BETWEEN '$tgl_awal' AND '$tgl_akhir'");
          return $this->db->get('tr_spk');
    }

    public function post($no_est)
    {
        $data = array(
            'posisi' => 'post',
            
          );
          $this->db->where('no_est', $no_est);
          $this->db->update($this->_table, $data);
    }
}