<?php
class M_account extends CI_Model
{
    private $_table = "ms_account";

    public function viewAccount()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahAccount()
    {
        $data = array(
            'no_account' => $this->input->post('no_account', true),
            'ket' => $this->input->post('ket', true),
     

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),

        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($no_account)
    {
        $this->db->where('no_account', $no_account);
        $this->db->delete($this->_table);
    }

    public function getById($no_account)
    {
        return $this->db->get_where($this->_table, ['no_account' => $no_account])->row_array();
    }

    public function ubahAccount()
    {
        $data = array(
            'ket' => $this->input->post('ket'),
                     
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );

        $this->db->where('no_account', $this->input->post('no_account'));
        $this->db->update($this->_table, $data);

    }
}
