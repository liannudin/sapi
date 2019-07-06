<?php 

class Crud_model extends CI_Model
{

	function __construct(){
		parent::__construct();	

	}

	function create($table,$id){
		$cookie = $this->security->get_csrf_hash();
		$this->db->insert($table,array($id=>"",'cookie'=>$cookie));
		return $this->db->insert_id();
	}
	
	function read(){
		$cookie = $this->security->get_csrf_hash();
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->join('input','alternatif.id_alternatif=input.id_alternatif');
		$this->db->order_by('input.id_alternatif','ASC');
		$this->db->where('cookie',$cookie);
		$query = $this->db->get();
		return $query;
	}
	function read_alt($table){
		$cookie = $this->security->get_csrf_hash();
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('cookie',$cookie);
		$query = $this->db->get();
		return $query;
	}

	function update($id,$value,$modul){
		$this->db->where(array("id_input"=>$id));
		$this->db->update("input",array($modul=>$value));
	}
	function updatew($id,$value,$modul){
		$this->db->where(array("id_w"=>$id));
		$this->db->update("tbl_w",array($modul=>$value));
	}

	function delete($id){
		$this->db->where("id_input",$id);
		$this->db->delete("input");
	}

	function _data($id){
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->join('kriteria','alternatif.id_alternatif=kriteria.id_alternatif');
		$this->db->where('kriteria.id_alternatif',$id);
		$query = $this->db->get();
		return $query;
	}
	function _data_max($c)
	{
		$cookie = $this->security->get_csrf_hash();
		$this->db->select_max($c);
		$this->db->where('cookie',$cookie);
		$query = $this->db->get('input');
		return $query;
	}
	function _data_w()
	{
		$cookie = $this->security->get_csrf_hash();
		$this->db->select('*');
		$this->db->from('tbl_w');
		$this->db->where('cookie',$cookie);
		$query = $this->db->get();
		return $query;
	}
	function cookie($where)
	{
		$this->db->from('data');
		$this->db->where('cookie',$where);
		$query = $this->db->get();
		return $query;
	}

	public function getAllKriteria()
	{
		return $this->db->select()
		->from('kriteria')
		->join('alternatif', 'alternatif.id_alternatif=kriteria.id_alternatif')
		->get()
		->result();
	}

	public function getAllAlternatif()
	{
		return $this->db->from('alternatif')
						->get()
						->result();
	}

	public function getDetailKriteria($id_kriteria)
	{
		$kriteria = $this->db->from('kriteria')
						->join('alternatif', 'alternatif.id_alternatif=kriteria.id_alternatif')
						->where('kriteria.id_kriteria', $id_kriteria)
						->get()
						->row();

		$alternatif = $this->db->from('alternatif')->get()->result();

		$kriteria = array(
			'id' => $kriteria->id,
			'id_kriteria' => $kriteria->id_kriteria,
			'id_alternatif' => $kriteria->id_alternatif,
			'berat' => $this->backToSampai($kriteria->berat),
			'umur' => $this->backToSampai($kriteria->umur),
			'tinggi' => $this->backToSampai($kriteria->tinggi),
			'panjang_tanduk' => $kriteria->panjang_tanduk,
			'kondisi' => $kriteria->kondisi,
			'nilai' => $kriteria->nilai,
			'jenis_sapi' => $kriteria->jenis_sapi
		);

		return array(
			'kriteria' => (object) $kriteria,
			'alternatif' => $alternatif
		);
	}

	public function testing_tambah()
	{

		$data = array(
			'id_alternatif' => $this->input->post('id_alternatif'),
			'berat' => $this->changeToSampai($this->input->post('berat')),
			'umur' => $this->changeToSampai($this->input->post('umur')),
			'tinggi' => $this->changeToSampai($this->input->post('tinggi')),
			'panjang_tanduk' => $this->input->post('panjang_tanduk'),
			'kondisi' => $this->input->post('kondisi'),
			'nilai' => $this->input->post('nilai')
		);
		$this->db->insert('kriteria', $data);
	}

	public function testing_edit()
	{

		$data = array(
			'id_alternatif' => $this->input->post('id_alternatif'),
			'berat' => $this->changeToSampai($this->input->post('berat')),
			'umur' => $this->changeToSampai($this->input->post('umur')),
			'tinggi' => $this->changeToSampai($this->input->post('tinggi')),
			'panjang_tanduk' => $this->input->post('panjang_tanduk'),
			'kondisi' => $this->input->post('kondisi'),
			'nilai' => $this->input->post('nilai')
		);

		$this->db->where('id_kriteria', $this->input->post('id_kriteria'))
				 ->update('kriteria', $data);
	}

	private function changeToSampai($data)
	{
		$data = str_replace(';', '-', $data);
		return $data;
	}

	private function backToSampai($data)
	{
		$data = str_replace('-', ';', $data);
		$data = explode(';', $data);
		return $data;
	}

	public function testing_delete($id_kriteria)
	{
		$this->db->delete('kriteria', array('id_kriteria' => $id_kriteria));
	}
}