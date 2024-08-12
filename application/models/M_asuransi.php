<?php
class M_asuransi extends CI_Model
{
    private $_table = "ms_asuransi";

    public function viewAsuransi()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahAsuransi()
    {
        $data = array(
            'kd_asuransi' => $this->input->post('kode', true),
            'nama_asuransi' => $this->input->post('nama', true),
     

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),

        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($kd_asuransi)
    {
        $this->db->where('kd_asuransi', $kd_asuransi);
        $this->db->delete($this->_table);
    }

    public function getById($kd_asuransi)
    {
        return $this->db->get_where($this->_table, ['kd_asuransi' => $kd_asuransi])->row_array();
    }

    public function ubahAsuransi()
    {
        $data = array(
            'nama_asuransi' => $this->input->post('nama'),
                     
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );

        $this->db->where('kd_asuransi', $this->input->post('kd_asuransi'));
        $this->db->update($this->_table, $data);

    }
}
