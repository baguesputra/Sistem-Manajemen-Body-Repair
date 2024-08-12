<?php
 
class M_auth extends CI_Model
{
    
    private $table_user = "user";
    private $table_history = 'history';
    
    function cek_login($table,$where){     
        return $this->db->get_where($table,$where);
    }  

    public function viewUser()
    {
        return $this->db->get($this->table_user)->result_array();
    }

    public function statusLogin()
    {
        $data = array(

            'status' => '1',
           
        );
        $this->db->where('username', $this->input->post('username'));
        $this->db->update($this->table_user, $data);

        $user = $this->session->userdata("username");
        $tgl_now = Date('Y-m-d\TH:i:s',time());
        $data = array(

            'modul' => 'Login',
            'ket' => "User $user login pada waktu $tgl_now",

            'created_by' => $this->session->userdata("username"),
            'created_at' => $tgl_now,

        );
        $this->db->insert($this->table_history, $data);
    }

    public function statusLogout()
    {
        $tgl_now = Date('Y-m-d\TH:i:s',time());
        $data = array(

            'status' => '0',
            'last_active' => $tgl_now,
           
        );
        $this->db->where('username', $this->session->userdata("username"));
        $this->db->update($this->table_user, $data);

        $user = $this->session->userdata("username");
        $tgl_now = Date('Y-m-d\TH:i:s',time());
        $data = array(

            'modul' => 'Logout',
            'ket' => "User $user logout pada waktu $tgl_now",

            'created_by' => $this->session->userdata("username"),
            'created_at' => $tgl_now,
            
        );
        $this->db->insert($this->table_history, $data);
    }


   
}