<?php 

class Loginadmin extends CI_Controller{

    function __construct(){
        parent::__construct();      
        $this->load->model('login_modeal','login');

    }

    function index(){
        $this->load->view('auth/login');
    }

    function aksi_login(){
        $username = $this->input->post('username'); //harus sesuai name di form login
        $password = $this->input->post('password'); //harus sesuai name di form login
        $where = array(
            'username' => $username,
            'password' => md5($password)
            );
        $cek = $this->login->cek_login("users",$where)->num_rows();
        if($cek > 0){

            $data_session = array(
                'nama' => $username,
                'status' => "login"
                );

            $this->session->set_userdata($data_session);

            redirect(base_url("/admin/dashboard"));

        }else{
            echo "Username dan password salah !";
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}