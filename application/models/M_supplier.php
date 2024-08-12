<?php
class M_supplier extends CI_Model
{
    private $_table = "ms_supplier";

    public function viewSupplier()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambah()
    {
        $data = array(
            'kd_supplier' => $this->input->post('kd_supplier', true),
            'nama' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'no' => $this->input->post('no', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function buat_kode()   
    {
        $this->db->select('RIGHT(ms_supplier.kd_supplier,4) as kd_supplier', FALSE);
        $this->db->order_by('kd_supplier','DESC');
        $this->db->limit(1);
        $query = $this->db->get('ms_supplier');     
            if($query->num_rows() <> 0){
                $data = $query->row();
                $kode = intval($data->kd_supplier) + 1;
            } else {
                $kode = 1;
            }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
        $kodejadi = "SPL-".$kodemax;   
        return $kodejadi;
    }

    public function hapus($kd_supplier)
    {
        $this->db->where('kd_supplier', $kd_supplier);
        $this->db->delete($this->_table);
    }
    
    public function getById($kd_supplier)
    {
        return $this->db->get_where($this->_table, ['kd_supplier' => $kd_supplier])->row_array();
    }

    public function ubah()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no' => $this->input->post('no'),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );

        $this->db->where('kd_supplier', $this->input->post('kd_supplier'));
        $this->db->update($this->_table, $data);
    }
    
}