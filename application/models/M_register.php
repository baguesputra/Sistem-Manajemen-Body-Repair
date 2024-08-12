<?php
class M_register extends CI_Model
{
    private $_table = "register";

    public function viewRegister()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahPart()
    {
        $data = array(
            'kd_part' => $this->input->post('kd_part', true),
            'nama' => $this->input->post('nama', true),
            'harga' => $this->input->post('harga', true),
            'stok' => $this->input->post('stok', true),
            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($kd_part)
    {
        $this->db->where('kd_part', $kd_part);
        $this->db->delete($this->_table);
    }

    public function getById($kd_part)
    {
        return $this->db->get_where($this->_table, ['kd_part' => $kd_part])->row_array();
    }

    public function ubahPart()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->where('kd_part', $this->input->post('kd_part'));
        $this->db->update($this->_table, $data);

    }

    public function buat_kode()   
    {
            $this->db->select('RIGHT(ms_part.kd_part,4) as kd_part', FALSE);
            $this->db->order_by('kd_part','DESC');
            $this->db->limit(1);
            $query = $this->db->get('ms_part');      
                if($query->num_rows() <> 0){
                    $data = $query->row();
                    $kode = intval($data->kd_part) + 1;
                } else {
                    $kode = 1;
                }
            $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
            $kodejadi = "SP-".$kodemax;    
            return $kodejadi;
    }

}
