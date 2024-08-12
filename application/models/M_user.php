<?php
class M_user extends CI_Model
{
    private $_table = "user";

    public function viewUser()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambah()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level', true),
            'status' => '1',

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),

        );
        $this->db->insert($this->_table, $data);
    }

    public function nonAktif($id)
    {
        $data = array(
          'status' => '0',
         
        );
        $this->db->where('id', $id);
        $this->db->update($this->_table, $data);
    }  

}