<?php
class M_bahan extends CI_Model
{
    private $_table = "ms_bahan";

    public function viewBahan()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahBahan()
    {
        $data = array(
            'kd_bahan' => $this->input->post('kd_bahan', true),
            'nama' => $this->input->post('nama', true),
            'jumlah' => $this->input->post('jumlah', true),
            'ket' => $this->input->post('ket', true),
            'harga' => $this->input->post('harga', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function buat_kode()   
    {
        $this->db->select('RIGHT(ms_bahan.kd_bahan,4) as kd_bahan', FALSE);
        $this->db->order_by('kd_bahan','DESC');
        $this->db->limit(1);
        $query = $this->db->get('ms_bahan');     
            if($query->num_rows() <> 0){
                $data = $query->row();
                $kode = intval($data->kd_bahan) + 1;
            } else {
                $kode = 1;
            }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
        $kodejadi = "BN-".$kodemax;   
        return $kodejadi;
    }

    public function hapus($kd_bahan)
    {
        $this->db->where('kd_bahan', $kd_bahan);
        $this->db->delete($this->_table);
    }
    
    public function getById($kd_bahan)
    {
        return $this->db->get_where($this->_table, ['kd_bahan' => $kd_bahan])->row_array();
    }

    public function ubahBahan()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jumlah' => $this->input->post('jumlah'),
            'ket' => $this->input->post('ket', true),
            'harga' => $this->input->post('harga', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );

        $this->db->where('kd_bahan', $this->input->post('kd_bahan'));
        $this->db->update($this->_table, $data);
    }
    
}