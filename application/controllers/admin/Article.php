<?php 

class Article extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('artikel','art');
        $this->load->model('model_barang');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    function index(){
        //$data['artikel'] = $this->art->get_news();
        $data['record'] = $this->art->get_news()->result();
		$this->load->view('admin/allpost',$data);
    }

    public function view($slug = NULL)
    {
	        $data['art_item'] = $this->art->get_news($slug);

	        if (empty($data['art_item']))
	        {
	                show_404();
	        }

	        $this->load->view('admin/artikel/view', $data);
	        }
	public function create($slug = NULL)
	{
	        
			$data['art_item'] = $this->art->get_news($slug);
	     

		if(isset($_POST['submit'])){
			$this->art->add_article();
			 redirect(base_url('/admin/artikel'));


			}else{
				$this->load->model('model_kategori');
				$this->load->model('model_provinsi');
				//$this->load->model('gallery');
				//$data['gallery']	=$this->gallery->tampilkan_data()->result();
				$data['default_provinsi']		=$this->model_provinsi->default_provinsi();
				$data['default_category']		=$this->model_kategori->default_category();
				$data['kategori']		=$this->model_kategori->get_all_categories();
				$data['provinsi']		=$this->model_provinsi->get_all_provinsi();

				$this->load->view('/admin/artikel/create',$data);
		}


	}
    public function edit($slug = NULL){
		$data['art_item'] = $this->art->get_news($slug);
	    if(isset($_POST['submit'])){
			$this->art->edit_artikel();
			redirect(base_url('admin/artikel'));
			}else{
				$id = $this->uri->segment(4);
				$this->load->model('model_kategori');
				$this->load->model('model_provinsi');
				$data['kategori']	=$this->model_kategori->get_all();
				//$data['uncategorized']	=	$this->model_kategori->uncategorized()->result();
				$data['record']		=$this->art->ambil_satu($id)->row_array();
				$data['provinsi']	=$this->model_provinsi->get_all();
				$this->load->view('admin/artikel/edit',$data);
		}

	}
	public function delete(){
	$id= $this->uri->segment(4);
	$this->art->delete($id);
	redirect('admin/artikel');
	}
	//ARTIKEL SELESAI//
}