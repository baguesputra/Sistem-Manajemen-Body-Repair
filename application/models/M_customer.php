<?php
class M_customer extends CI_Model
{
    private $_table = "ms_customer";

    public function viewCustomer()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahCustomer()
    {
        $data = array(
            'kd_customer' => $this->input->post('kd_customer', true),
            'nama_customer' => $this->input->post('nama_customer', true),
            'tipe' => $this->input->post('tipe', true),
            'telpon' => $this->input->post('telpon', true),
            'no_ktp' => $this->input->post('no_ktp', true),
            'no_npwp' => $this->input->post('no_npwp', true),
            'lahir' => $this->input->post('lahir', true),
            'alamat' => $this->input->post('alamat', true),

            'created_by' => $this->input->post('created_by', true),
            'created_at' => $this->input->post('created_at', true),
            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),
        );
        $this->db->insert($this->_table, $data);
    }

    public function hapus($kd_customer)
    {
        $this->db->where('kd_customer', $kd_customer);
        $this->db->delete($this->_table);
    }

    public function getById($kd_customer)
    {
        return $this->db->get_where($this->_table, ['kd_customer' => $kd_customer])->row_array();
    }

    public function ubahCustomer()
    {
        $data = array(
            'nama_customer' => $this->input->post('nama_customer'),
            'tipe' => $this->input->post('tipe'),
            'telpon' => $this->input->post('telpon'),
            'no_ktp' => $this->input->post('no_ktp'),
            'no_npwp' => $this->input->post('no_npwp'),
            'lahir' => $this->input->post('lahir'),
            'alamat' => $this->input->post('alamat'),

            'updated_by' => $this->input->post('updated_by', true),
            'updated_at' => $this->input->post('updated_at', true),

        );
        $this->db->where('kd_customer', $this->input->post('kd_customer'));
        $this->db->update($this->_table, $data);

    }


    public function buat_kode()   
    {
        $this->db->select('RIGHT(ms_customer.kd_customer,4) as kd_customer', FALSE);
        $this->db->order_by('kd_customer','DESC');
        $this->db->limit(1);
        $query = $this->db->get('ms_customer');      //cek dulu apakah ada sudah ada kode di tabel.
            if($query->num_rows() <> 0){
                //jika kode ternyata sudah ada.
                $data = $query->row();
                $kode = intval($data->kd_customer) + 1;
            } else {
                //jika kode belum ada
                $kode = 1;
            }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "CST-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }

}
