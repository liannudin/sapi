<?php 

class Crud extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('crud_model');
		$this->load->helper('url');
		$this->load->database();
	}


	function index(){
		$this->cookieCheck();
		$cookie = $this->security->get_csrf_hash();
		$data = array(
			'cook' 			=> $this->crud_model->cookie($cookie)->row(),
			'matriksInput' 	=> $this->crud_model->read_alt('input')->result(),
			'bobotW'		=> $this->crud_model->read_alt('tbl_w')->result(),
			'xij'			=> $this->crud_model->read()->result(),
			'x'				=> $this->crud_model->read()->result(),
			'max_c1' 		=> $this->crud_model->_data_max('c1')->row(),
			'max_c2' 		=> $this->crud_model->_data_max('c2')->row(),
			'max_c3' 		=> $this->crud_model->_data_max('c3')->row(),
			'max_c4' 		=> $this->crud_model->_data_max('c4')->row(),
			'w'				=> $this->crud_model->_data_w()->row()
			);
		$this->load->view("crud_view",$data);
	}
	function create(){
		echo json_encode(array("id"=>$this->crud_model->create('input','id_input')));
	}
	function read_inputan()
	{
		$data = array();
		$data = $this->crud_model->read()->result();
		$this->output->set_output(json_encode($data));
	}
	function update(){
		$id= $this->input->post("id");
		$value= $this->input->post("value");
		$modul= $this->input->post("modul");
		$this->crud_model->update($id,$value,$modul);
		echo "{}";
	}
	function updatew(){
		$id= $this->input->post("id");
		$value= $this->input->post("value");
		$modul= $this->input->post("modul");
		$this->crud_model->updatew($id,$value,$modul);
		echo "{}";
	}

	function delete(){
		$id= $this->input->post("id");
		$this->crud_model->delete($id);
		echo "{}";
	}
	function show($id){
		$kri = $this->crud_model->_data($id)->result();
		return $kri;
	}

	function lihat($id){
		$kri = array();
		$kri= $this->crud_model->_data($id)->result();
		$this->output->set_output(json_encode($kri));
	}
	function inputw(){
		echo json_encode(array("id"=>$this->crud_model->create('tbl_w','id_w')));
	
	}
	function reset()
	{
		$cookie = $this->security->get_csrf_hash();
		$this->db->delete(array('tbl_w','input'), array('cookie' => $cookie));

	}
	function cookieCheck()
	{
		$cookie = $this->security->get_csrf_hash();
		$w = $this->crud_model->cookie($cookie)->num_rows();
		if (!($w > 0)) {
			$this->db->insert('data',array('cookie' =>$cookie , ));
		}
	}

	public function paling_depan()
	{
		$this->load->view('paling_depan_bro');
	}

	public function login()
	{
		if($this->input->post())
		{

			print_r('Saya login');
			die;

		}else{
			$this->load->view('login');
		}
	}

	public function testing()
	{
		$data['sapi'] = $this->crud_model->getAllKriteria();
		$this->load->view('testaja', $data);
	}	

	public function testing_tambah()
	{
		if ($this->input->post()) {
			$this->crud_model->testing_tambah();
			redirect('crud/testing');
		}else{
			$data['sapi'] = $this->crud_model->getAllAlternatif();
			$this->load->view('testing_tambah', $data);
		}
	}
	public function testing_edit($id_kriteria = null)
	{
		if ($this->input->post()) {
			$this->crud_model->testing_edit();
			redirect('crud/testing');
		}else{
			$data['sapi'] = $this->crud_model->getDetailKriteria($id_kriteria);
			// print_r($data['sapi']['kriteria']->tinggi[0]);die;

			$this->load->view('testing_edit', $data);
		}
	}

	public function testing_delete($id_kriteria)
	{
		$this->crud_model->testing_delete($id_kriteria);
		redirect('crud/testing');
	}
}