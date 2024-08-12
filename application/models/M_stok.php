<?php
class M_stok extends CI_Model
{
    private $_table = "stok_detail";

    public function viewStok()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function getById($kd_detail)
    {
        return $this->db->get_where($this->_table, ['kd_detail' => $kd_detail])->row_array();
    }

  
    
}