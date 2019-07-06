<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('model_kategori');
	 	}


	public function index()
	{

		$data['category']=$this->model_kategori->get_all_categories();
		$data['default']=$this->model_kategori->default_category();
		
		$this->load->view('admin/kategori/daftar_kategori',$data);
	}
	
	public function category_add()
		{
			$data = array(
					'nama_kategori'  => $this->input->post('nama_kategori'),
					'deskripsi'		 => $this->input->post('deskripsi'),
					
				);
			$insert = $this->model_kategori->category_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id)
		{
			$data = $this->model_kategori->get_by_id($id);

			echo json_encode($data);
		}

		public function category_update()
	{
		$data = array(
				'nama_kategori' => $this->input->post('nama_kategori'),
				'deskripsi' => $this->input->post('deskripsi'),
				
			);
		$this->model_kategori->category_update(array('id_kategori' => $this->input->post('id_kategori')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function category_delete($id)
	{
		$this->model_kategori->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}



}
