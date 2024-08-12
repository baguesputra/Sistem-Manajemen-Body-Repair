<?php
class M_kendaraan extends CI_Model
{
    private $_table = "ms_kendaraan";

    public function viewKendaraan()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahKendaraan()
    {
        $data = array(
            'kd_kendaraan' => $this->input->post('kd_kendaraan', true),
            'no_polisi' => $this->input->post('no_polisi', true),
            'brand' => $this->input->post('brand', true),
            'kd_rangka' => $this->input->post('kd_rangka', true),
            'no_rangka' => $this->input->post('no_rangka', true),
            'kd_mesin' => $this->input->post('kd_mesin', true),
            'no_mesin' => $this->input->post('no_mesin', true),
            'model' => $this->input->post('model', true),
            'tahun' => $this->input->post('tahun', true),
            'trans' => $this->input->post('trans', true),
            'warna' => $this->input->post('warna', true),
            'kd_customer' => $this->input->post('kd_customer', true),
            'nama_customer' => $this->input->post('nama_customer', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($kd_kendaraan)
    {
        $this->db->where('kd_kendaraan', $kd_kendaraan);
        $this->db->delete($this->_table);
    }

    public function getById($kd_kendaraan)
    {
        return $this->db->get_where($this->_table, ['kd_kendaraan' => $kd_kendaraan])->row_array();
    }

    public function ubahKendaraan()
    {
        $data = array(
            'no_polisi' => $this->input->post('no_polisi'),
            'brand' => $this->input->post('brand'),
            'kd_rangka' => $this->input->post('kd_rangka'),
            'no_rangka' => $this->input->post('no_rangka'),
            'kd_mesin' => $this->input->post('kd_mesin'),
            'no_mesin' => $this->input->post('no_mesin'),
            'model' => $this->input->post('model'),
            'tahun' => $this->input->post('tahun'),
            'trans' => $this->input->post('trans'),
            'warna' => $this->input->post('warna'),
            'kd_customer' => $this->input->post('kd_customer'),
            'nama_customer' => $this->input->post('nama_customer', true),

            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->where('kd_kendaraan', $this->input->post('kd_kendaraan'));
        $this->db->update($this->_table, $data);

    }

    public function buat_kode()   
    {
        $this->db->select('RIGHT(ms_kendaraan.kd_kendaraan,4) as kd_kendaraan', FALSE);
        $this->db->order_by('kd_kendaraan','DESC');
        $this->db->limit(1);
        $query = $this->db->get('ms_kendaraan');      
            if($query->num_rows() <> 0){
                $data = $query->row();
                $kode = intval($data->kd_kendaraan) + 1;
            } else {
                $kode = 1;
            }
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); 
        $kodejadi = "KND-".$kodemax;    
        return $kodejadi;
    }

}
