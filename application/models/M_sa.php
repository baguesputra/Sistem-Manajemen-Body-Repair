<?php
class M_sa extends CI_Model
{
    private $_table = "ms_sa";

    public function viewSa()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahSa()
    {
        $data = array(
            'kd_sa' => $this->input->post('kd_sa', true),
            'nama_sa' => $this->input->post('nama', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($kd_sa)
    {
        $this->db->where('kd_sa', $kd_sa);
        $this->db->delete($this->_table);
    }

    public function getById($kd_sa)
    {
        return $this->db->get_where($this->_table, ['kd_sa' => $kd_sa])->row_array();
    }

    public function ubahSa()
    {
        $data = array(
            'nama_sa' => $this->input->post('nama'),

            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->where('kd_sa', $this->input->post('kd_sa'));
        $this->db->update($this->_table, $data);

    }


    public function buat_kode()   {

            $this->db->select('RIGHT(ms_sa.kd_sa,4) as kd_sa', FALSE);
            $this->db->order_by('kd_sa','DESC');
            $this->db->limit(1);
            $query = $this->db->get('ms_sa');      //cek dulu apakah ada sudah ada kode di tabel.
                if($query->num_rows() <> 0){
                    $data = $query->row();
                    $kode = intval($data->kd_sa) + 1;
                } else {
                    $kode = 1;
                }
            $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
            $kodejadi = "SA-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
            return $kodejadi;
    }

}
