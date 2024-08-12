<?php
 
class Auth extends CI_Controller{
 
    function __construct()
    {
        parent::__construct();     
        $this->load->model('M_auth');
 
    }
 
    function index()
    {
        $this->load->view('welcome_message');
    }
 
    function aksi_login()   
    {
        
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $where = array(
            'username' => $username,
            'password' => $password
            );
        $cek = $this->M_auth->cek_login("user",$where)->num_rows();
        if($cek > 0){
 
            $data_session = array(
                'username' => $username,
                'status' => "login",
                );
 
            $this->session->set_userdata($data_session);
            $this->M_auth->statusLogin();

            if ($this->session->username == "11.12.300") {
                redirect(base_url("spk/wip"));
            } else {
                redirect(base_url("spk"));
            }
 
        }else{
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('/');
        }
    }
 
    public function logout()
    {
        $this->session->sess_destroy();
        $this->M_auth->statusLogout();
        redirect(base_url('/'));
    }

    public function cek_login()
    {

            if($this->CI->session->userdata('username') == '') {
            $this->CI->session->set_flashdata('sukses','Anda belum login');
            redirect(base_url('/'));}
    }    
    
}