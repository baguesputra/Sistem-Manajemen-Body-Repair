<?php
class M_bkk extends CI_Model
{
    private $_table = "bkk";

    public function viewBkk()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahBkk()
    {
        $data = array(
            'no_dok' => $this->input->post('no_dok', true),
            'tgl' => $this->input->post('tgl', true),
            'tgl_terima' => $this->input->post('tgl', true),
            'tipe' => $this->input->post('tipe', true),
            'kd_bank' => $this->input->post('kd_bank', true),
            'penerimaan' => $this->input->post('penerimaan', true),
            'jumlah' => $this->input->post('jumlah', true),
            'selisih' => $this->input->post('selisih', true),
            'ket' => $this->input->post('ket', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($no_est)
    {
        $this->db->where('no_est', $no_est);
        $this->db->delete($this->_table);
    }
    
    public function updateStatus($no_est)
    {
        $this->db->select('RIGHT(tr_spk.no_spk,6) as no_spk', FALSE);
        $this->db->order_by('no_spk','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tr_spk');      
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_spk) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "SPK-22-".$kodemax;
        
        $data = array(
          'no_spk' => $kodejadi,
          'status' => 'SPK',
        );
        $this->db->where('no_est', $no_est);
        $this->db->update($this->_table, $data);
    }

    public function statusFinish($no_est)
    {
        $this->db->select('RIGHT(tr_spk.no_inv,6) as no_inv', FALSE);
        $this->db->order_by('no_inv','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tr_spk');      
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_inv) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "INV-22-".$kodemax;
        
        $data = array(
          'no_inv' => $kodejadi,
          'status' => 'Finish',
        );
        $this->db->where('no_est', $no_est);
        $this->db->update($this->_table, $data);
    }

    public function getById($no_dok)
    {
        return $this->db->get_where($this->_table, ['no_dok' => $no_dok])->row_array();
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
        $this->db->update($this->_table, $data);
    }

    public function ubahM()
    {
        $data = array(
        
          'tgl_spk' => $this->input->post('tgl_spk'),
          'no_spk' => $this->input->post('no_spk'),
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
        $this->db->update($this->_table, $data);
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
          );
        $this->db->insert($this->table, $data);
    }

    public function ubahStatus()
    {
        $data = array(
          'status' => $this->input->post('status'),
          'mulai' => $this->input->post('mulai'),
          'tgl_pengerjaan' => $this->input->post('akhir'),
        );
        $this->db->where('no_est', $this->input->post('no_est'));
        $this->db->update($this->_table, $data);
    }

    public function ubahStatusspk()
    {
        $data = array(
          'status' => $this->input->post('status'),
        );
        $this->db->where('no_est', $this->input->post('no_est'));
        $this->db->update($this->_table, $data);
    }

    public function statusSpk()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function buat_kode_bank()   
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
        $kodejadi = "BBT-22-".$kodemax;    
        return $kodejadi;
    }

    public function buat_kode_kas()   
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
        $kodejadi = "BKT-22-".$kodemax;    
        return $kodejadi;
    }

    public function ambil_kode()   
    {
        $this->db->select('RIGHT(tr_spk.no_est,6) as no_est', FALSE);
        $this->db->order_by('no_est','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tr_spk');      
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode1 = intval($data->no_est);
          } else {
            $kode1 = intval($data->no_est);
          }

        $kodemax1 = str_pad($kode1, 6, "0", STR_PAD_LEFT); 
        $kodejadi1 = "EST-22-".$kodemax1;    
        return $kodejadi1;
    }

    public function ambil_kode_stok()   
    {

      $this->db->select('RIGHT(stok_detail.kd_detail,4) as kd_detail', FALSE);
      $this->db->order_by('kd_detail','DESC');
      $this->db->limit(1);
      $query = $this->db->get('stok_detail');      
      if($query->num_rows() <> 0){
   
      $data = $query->row();
      $kode = intval($data->kd_detail) + 1;
      }
      else {
   
      $kode = 1;
      }
  
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
      $kodejadi = "DE-".$kodemax;   
      return $kodejadi;
    }

    public function kode_spk()   
    {
        $this->db->select('RIGHT(tr_spk.no_spk,6) as no_spk', FALSE);
        $this->db->order_by('no_spk','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tr_spk');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_est) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "SPK-22-".$kodemax;    
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

    public function cetakBahan($tgl_awal,$tgl_akhir)
    {
         $this->db->where("tgl_spk BETWEEN '$tgl_awal' AND '$tgl_akhir'");
          return $this->db->get('tr_spk');
    }

    public function cetakJasa($tgl_awal,$tgl_akhir)
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

    public function totalJasa(){
      $this->db->select_sum('total');
      $query = $this->db->get('tr_spk_detail');
      if($query->num_rows()>0)
      {
        return $query->row()->total;
      }
      else
      {
        return 0;
      }
    }



       
}