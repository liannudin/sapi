<?php 

class Provinsi extends CI_Controller {
	
	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('model_provinsi');
	 	}


	public function index()
	{

		$data['provinsi']=$this->model_provinsi->get_all_categories();
		$data['default']=$this->model_provinsi->default_provinsi();
		
		$this->load->view('admin/kategori/daftar_kategori',$data);
	}
	
	public function provinsi_add()
		{
			$data = array(
					'nama_prov'  => $this->input->post('nama_prov')
				);
			$insert = $this->model_provinsi->provinsi_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id)
		{
			$data = $this->model_provinsi->get_by_id($id);

			echo json_encode($data);
		}

		public function provinsi_update()
	{
		$data = array(
				'nama_prov' => $this->input->post('nama_prov')
			);
		$this->model_provinsi->provinsi_update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function provinsi_delete($id)
	{
		$this->model_provinsi->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
}