<?php
class M_fm extends CI_Model
{
    private $_table = "ms_fm";

    public function viewFm()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahFm()
    {
        $data = array(
            'kd_fm' => $this->input->post('kd_fm', true),
            'nama_fm' => $this->input->post('nama', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($kd_fm)
    {
        $this->db->where('kd_fm', $kd_fm);
        $this->db->delete($this->_table);
    }

    public function getById($kd_fm)
    {
        return $this->db->get_where($this->_table, ['kd_fm' => $kd_fm])->row_array();
    }

    public function ubahFm()
    {
        $data = array(

            'nama_fm' => $this->input->post('nama'),

            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->where('kd_fm', $this->input->post('kd_fm'));
        $this->db->update($this->_table, $data);

    }

    public function buat_kode()   
    {
        $this->db->select('RIGHT(ms_fm.kd_fm,4) as kd_fm', FALSE);
        $this->db->order_by('kd_fm','DESC');
        $this->db->limit(1);
        $query = $this->db->get('ms_fm');      
            if($query->num_rows() <> 0){
                $data = $query->row();
                $kode = intval($data->kd_fm) + 1;
            } else {
                $kode = 1;
            }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
        $kodejadi = "FM-".$kodemax;   
        return $kodejadi;
    }
}
