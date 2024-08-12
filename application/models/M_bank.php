<?php
class M_bank extends CI_Model
{
    private $_table = "ms_bank";

    public function viewBank()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahBank()
    {
        $data = array(
            'kd_bank' => $this->input->post('kd_bank', true),
            'nama' => $this->input->post('nama', true),
            'account' => $this->input->post('account', true),
            'no_account' => $this->input->post('no_account', true),
     

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),

        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($kd_bank)
    {
        $this->db->where('kd_bank', $kd_bank);
        $this->db->delete($this->_table);
    }

    public function getById($kd_bank)
    {
        return $this->db->get_where($this->_table, ['kd_bank' => $kd_bank])->row_array();
    }

    public function ubahBank()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'account' => $this->input->post('account', true),
            'no_account' => $this->input->post('no_account', true),
                     
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );

        $this->db->where('kd_bank', $this->input->post('kd_bank'));
        $this->db->update($this->_table, $data);

    }
}
