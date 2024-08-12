<?php
class M_jenis extends CI_Model
{
    private $_table = "ms_jenis";

    public function viewJenis()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahJenis()
    {
        $data = array(
            'kd_jenis' => $this->input->post('kd_jenis', true),
            'nama' => $this->input->post('nama', true),
            'harga' => $this->input->post('harga', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($kd_jenis)
    {
        $this->db->where('kd_jenis', $kd_jenis);
        $this->db->delete($this->_table);
    }

    public function getById($kd_jenis)
    {
        return $this->db->get_where($this->_table, ['kd_jenis' => $kd_jenis])->row_array();
    }

    public function ubahJenis()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),

            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->where('kd_jenis', $this->input->post('kd_jenis'));
        $this->db->update($this->_table, $data);

    }


    public function buat_kode()   
    {
        $this->db->select('RIGHT(ms_jenis.kd_jenis,4) as kd_jenis', FALSE);
        $this->db->order_by('kd_jenis','DESC');
        $this->db->limit(1);
        $query = $this->db->get('ms_jenis');     
            if($query->num_rows() <> 0){
                $data = $query->row();
                $kode = intval($data->kd_jenis) + 1;
            } else {
                $kode = 1;
            }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
        $kodejadi = "JS-".$kodemax;    
        return $kodejadi;
    }

}
