<?php 

class Kategori extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_kategori');
	}
	function index(){
	$data['record']	= $this->model_kategori->tampilkan_data()->result();
	$data['uncategorized']	=	$this->model_kategori->uncategorized()->result();
	$this->load->view('admin/kategori/daftar_kategori',$data);
	}
	function insert(){
		if(isset($_POST['submit'])){
			$this->model_kategori->insert();
			redirect('admin/kategori');


		}else{
			$this->load->view('kategori/input');
		}
	}

	function edit(){
		if(isset($_POST['submit'])){
			$this->model_kategori->update();
			redirect('admin/kategori');


		}else{
			$id = $this->uri->segment(3);
			$data['record']=$this->model_kategori->ambil_satu($id)->row_array();
			$this->load->view('admin/kategori',$data);
		}
	}

	function delete(){
		$id= $this->uri->segment(4);
		$this->model_kategori->delete($id);
		redirect('admin/kategori');
	}
    
    public function ajax_add_kategori()
	{
		$data = array(
				
				'deskripsi' 			=> $this->input->post('deskripsi'),
				'nama_kategori' 		=> $this->input->post('nama_kategori')
				);
		$insert = $this->model_kategori->insert_ajax($data);
		echo json_encode(array("status" => TRUE));
	}
}