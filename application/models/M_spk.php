<?php
class M_spk extends CI_Model
{
    private $table_spk = "tr_spk";
    private $table_part = "ms_part";
    private $table_spkdetail = "tr_spk_detail";
    private $table_stok = "stok_detail";
    private $table_history = "history";

    public function viewSpk()
    {
        return $this->db->get($this->table_spk)->result_array();
    }

    public function tambahSpk()
    {
        $data = array(
            'no_est' => $this->input->post('no_est', true),
            'tgl_spk' => $this->input->post('tgl_spk', true),
            'kd_asuransi' => $this->input->post('kd_asuransi', true),
            'kd_customer' => $this->input->post('kd_customer', true),
            'kd_kendaraan' => $this->input->post('kd_kendaraan', true),
            'pekerjaan' => $this->input->post('pekerjaan', true),
            'jenis' => $this->input->post('jenis', true),
            'kd_sa' => $this->input->post('kd_sa', true),
            'kd_fm' => $this->input->post('kd_fm', true),
            'vendor' => $this->input->post('vendor', true),
            'mulai' => $this->input->post('mulai', true),
            'akhir' => $this->input->post('akhir', true),
            'pembayar' => $this->input->post('pembayar'),
            'status' => $this->input->post('status', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->table_spk, $data);


        $tgl_now = Date('Y-m-d\TH:i:s',time());
        $est = $this->input->post('no_est', true);
        $data = array(
          'modul' => 'Tambah Estimasi',
          'ket' => "Tambah Estimasi dengan Nomor $est",

          'created_by' => $this->session->userdata("username"),
          'created_at' => $tgl_now,
        );
        $this->db->insert($this->table_history, $data);
    }

    public function hapus($no_est)
    {
        $this->db->where('no_est', $no_est);
        $this->db->delete($this->table_spk);

        $tgl_now = Date('Y-m-d\TH:i:s',time());
        $est = $this->input->post('no_est', true);
        $data = array(
          'modul' => 'Hapus Estimasi',
          'ket' => "Hapus Estimasi dengan Nomor $no_est",

          'created_by' => $this->session->userdata("username"),
          'created_at' => $tgl_now,
        );
        $this->db->insert($this->table_history, $data);
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
        $kodejadi = "SPK-23-".$kodemax;
        
        $data = array(
          'no_spk' => $kodejadi,
          'status' => 'SPK',
        );
        $this->db->where('no_est', $no_est);
        $this->db->update($this->table_spk, $data);
    }

    public function statusFinish($no_est)
    {
        $this->db->select('RIGHT(tr_spk.no_inv,6) as no_inv', FALSE);
        $this->db->order_by('tgl_inv','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tr_spk');      
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_inv) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "INV-23-".$kodemax;
        $tgl = date("Y-m-d");
        $tgl_now = Date('Y-m-d\TH:i:s',time());
        
        
        $data = array(
          'no_inv' => $kodejadi,
          'status' => 'Finish',
          'tgl_inv' => $tgl,
          'updated_by' => $this->session->userdata("username"),
          'updated_at' => $tgl_now,
        );
        $this->db->where('no_est', $no_est);
        $this->db->update($this->table_spk, $data);

        $this->db->where('no_est', $no_est);
        $q = $this->db->get('tr_spk')->row();
        $data_no_spk = $q->no_spk;
        
        $data = array(
          'modul' => 'Finish SPK',
          'ket' => "Status SPK dokumen $no_est $data_no_spk menjadi Finish dan menjadi invoice dengan nomor $kodejadi",

          'created_by' => $this->session->userdata("username"),
          'created_at' => $tgl_now,
        );
        $this->db->insert($this->table_history, $data);
    }

    public function getById($no_est)
    {
        return $this->db->get_where($this->table_spk, ['no_est' => $no_est])->row_array();
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
        $this->db->update($this->table_spk, $data);

        $tgl_now = Date('Y-m-d\TH:i:s',time());
        $data = array(
          'modul' => 'Ubah SPK',
          'ket' => "Update data SPK dokumen no $est",

          'created_by' => $this->session->userdata("username"),
          'created_at' => $tgl_now,
        );
        $this->db->insert($this->table_history, $data);
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
        $this->db->update($this->table_spk, $data);
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

        $tgl_now = Date('Y-m-d\TH:i:s',time());
        $est = $this->input->post('no_spk', true);
        $kode = $this->input->post('kd_detail', true);
        $data = array(
          'modul' => 'Ubah Detail SPK',
          'ket' => "Ubah detail spk no $est pada detail $kode",

          'created_by' => $this->session->userdata("username"),
          'created_at' => $tgl_now,
        );
        $this->db->insert($this->table_history, $data);
    }

    public function ubahStatus()
    {
        $data = array(
          'status' => $this->input->post('status'),
          'mulai' => $this->input->post('mulai'),
          'tgl_pengerjaan' => $this->input->post('akhir'),
        );
        $this->db->where('no_est', $this->input->post('no_est'));
        $this->db->update($this->table_spk, $data);
    }

    public function ubahStatusspk()
    {
        $data = array(
          'status' => $this->input->post('status'),
        );
        $this->db->where('no_est', $this->input->post('no_est'));
        $this->db->update($this->table_spk, $data);
    }

    public function statusSpk()
    {
        return $this->db->get($this->table_spk)->result_array();
    }

    public function buat_kode()   
    {

        $this->db->select('RIGHT(tr_spk.no_est,6) as no_est', FALSE);
        $this->db->order_by('created_at','DESC');
        $this->db->limit(1);
        $query = $this->db->query("select no_est from tr_spk order by created_at desc limit 1");     

            foreach ($query->result_array() as $q){   
            $no = $q['no_est'];
            $kode = intval($no) + 1;
            }
        
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "EST-23-".$kodemax;    
        return $kodejadi;
    }

    public function ambil_kode()   
    {
        $this->db->select('RIGHT(tr_spk.no_est,6) as no_est', FALSE);
        $this->db->order_by('created_at','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tr_spk');      
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode1 = intval($data->no_est) + 1;
          } else {
            $kode = 1;
          }

        $kodemax1 = str_pad($kode1, 6, "0", STR_PAD_LEFT); 
        $kodejadi1 = "EST-23-".$kodemax1;    
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
        $this->db->order_by('tgl_spk','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tr_spk');     
          if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->no_spk) + 1;
          } else {
            $kode = 1;
          }
        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
        $kodejadi = "SPK-23-".$kodemax;    
        return $kodejadi;
    }

    public function filter()
    {
        $this->db->insert($this->table_spk, $data);
    }

    public function cetakMonthly($tgl_awal,$tgl_akhir)
    {
        // return $this->table_spk->where('tgl_spk >=', $tgl_awal)->where('tgl_spk',$tgl_akhir)->get();
        // $query = $this->db->query
        // ("SELECT * FROM tr_spk where tgl_spk BETWEEN '$tgl_awal' and '$tgl_akhir' ORDER BY tgl_spk ASC");
        // return $query->result();

        // $this->db->where('tgl_spk >=',$tgl_awal); 
        // $this->db->where('tgl_spk >=',$tgl_awal);
        // return $this->db->get('tr_spk');

         $this->db->where("created_at BETWEEN '$tgl_awal' AND '$tgl_akhir'");
          return $this->db->get('tr_spk');
    }

    public function cetakInvoice($tgl_awal,$tgl_akhir)
    {
        // return $this->table_spk->where('tgl_spk >=', $tgl_awal)->where('tgl_spk',$tgl_akhir)->get();
        // $query = $this->db->query
        // ("SELECT * FROM tr_spk where tgl_spk BETWEEN '$tgl_awal' and '$tgl_akhir' ORDER BY tgl_spk ASC");
        // return $query->result();

        // $this->db->where('tgl_spk >=',$tgl_awal); 
        // $this->db->where('tgl_spk >=',$tgl_awal);
        // return $this->db->get('tr_spk');

         $this->db->where("tgl_inv >= '$tgl_awal' AND tgl_inv <= '".$tgl_akhir." 23:59:59'");
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
          $this->db->update($this->table_spk, $data);
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