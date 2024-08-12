<?php
class M_kwitansi extends CI_Model
{
    private $_table = "kwitansi";

    public function viewKwitansi()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahKwitansi()
    {
        $data = array(
            'no_kwitansi' => $this->input->post('no_kwitansi', true),
            'dari' => $this->input->post('dari', true),
            'tgl' => $this->input->post('tgl', true),
            'jumlah' => $this->input->post('jumlah', true),
            'ref' => $this->input->post('ref', true),
            'tempo' => $this->input->post('tempo', true),
            'untuk' => $this->input->post('untuk', true),
            'posisi' => 'buka',
     

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),

        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($no_kwitansi)
    {
        $this->db->where('kd_asuransi', $no_kwitansi);
        $this->db->delete($this->_table);
    }

    public function getById($no_kwitansi)
    {
        return $this->db->get_where($this->_table, ['no_kwitansi' => $no_kwitansi])->row_array();
    }

    public function ubahKwitansi()
    {
        $data = array(
            'no_kwitansi' => $this->input->post('no_kwitansi', true),
            'dari' => $this->input->post('dari', true),
            'tgl' => $this->input->post('tgl', true),
            'jumlah' => $this->input->post('jumlah', true),
            'ref' => $this->input->post('ref', true),
            'tempo' => $this->input->post('tempo', true),
            'untuk' => $this->input->post('untuk', true),
                     
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );

        $this->db->where('no_kwitansi', $this->input->post('no_kwitansi'));
        $this->db->update($this->_table, $data);

    }

    public function no_kwitansi()   
    {

      $this->db->select('RIGHT(kwitansi.no_kwitansi,6) as no_kwitansi', FALSE);
      $this->db->order_by('created_at','DESC');
      $this->db->limit(1);
      $query = $this->db->get('kwitansi');      
      if($query->num_rows() <> 0){
   
      $data = $query->row();
      $kode = intval($data->no_kwitansi) + 1;
      }
      else {
   
      $kode = 1;
      }
  
      $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
      $kodejadi = "MJM-23-".$kodemax;   
      return $kodejadi;
    }

    public function post($no_kwitansi)
    {
        $data = array(
            'posisi' => 'post',
            
          );
          $this->db->where('no_kwitansi', $no_kwitansi);
          $this->db->update($this->_table, $data);
    }
}
