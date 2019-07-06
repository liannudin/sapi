<?php 

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        

        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    function index(){
        if($this->uri->segment(2)=='')
        {
            redirect('/admin/dashboard');
        }else {
    	$this->load->model('artikel','hitung');
    	$data['artikel']=$this->hitung->record()->row_array();
    	$this->load->model('model_kategori');
    	$data['kategori']=$this->model_kategori->record()->row_array();
    	$this->load->model('gallery');
    	$data['gambar']=$this->gallery->record()->row_array();
    	$this->load->model('user');
    	$data['user']=$this->user->record()->row_array();
    	//print_r($data);die;
        $this->load->view('admin/dashboard',$data); }
    }
    
   
}