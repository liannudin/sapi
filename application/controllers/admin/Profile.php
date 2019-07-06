<?php 

class Profile extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('user','profile');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }


	function index(){

		$data['users']	= $this->profile->tampilkan_data()->row_array();
		$this->load->view('admin/user/view',$data);
	}
	public function edit(){
    	$id = $this->uri->segment(4);
		$this->load->model('user','profile');
		$data['record']		=$this->profile->ambil_satu($id)->row_array();
		$this->load->view('admin/user/edit',$data);
		}

	
	function save (){
		$this->profile->save();
		redirect(base_url('admin/profile'));
	}

}