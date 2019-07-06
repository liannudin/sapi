<?php 

class Library extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->library('form_validation');
		$this->load->model('gallery','gambar');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    function index(){
      	$data ['gambar']		= $this->gambar->get_all_image()->result();;
		
		$this->load->view('admin/media/library',$data);
    }
    
	public function edit(){
	    
	    if(isset($_POST['submit'])){
			$this->gambar->edit();
			redirect(base_url('admin/media'));
			}else{
				$id 				= $this->uri->segment(4);
				$data['record']		=$this->gambar->ambil_satu($id)->row_array();
				$this->load->model('model_provinsi');
				$data['provinsi']	=$this->model_provinsi->get_all();
				$this->load->view('admin/media/edit',$data);
		}

	}
	function delete(){
	
	$id= $this->uri->segment(4);
	$this->gambar->delete($id);
	redirect('admin/media');
	
	}
    function mass_upload_library (){
    	$this->load->model('model_provinsi');
    	$data['default_provinsi']		=$this->model_provinsi->default_provinsi();
		$data['gambar']					=$this->model_provinsi->get_all_provinsi();
			
		$this->load->view('admin/upload/add_mass',$data, array('error' => ' ' ));
	}

	function mass_upload() //fungsi upload
    {
    	//$this->load->model('gallery','gambar');
    	$data = array();
		if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
			$filesCount = count($_FILES['userFiles']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
				$_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
				$_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
				$_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

				$uploadPath = './assets/uploads/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				//$config['max_size']	= '100';
				//$config['max_width'] = '1024';
				//$config['max_height'] = '768';
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('userFile')){
					$fileData = $this->upload->data();
					$uploadData[$i]['nama'] 	= $fileData['file_name'];
					$uploadData[$i]['created'] 	= date("Y-m-d H:i:s");
					$uploadData[$i]['modified'] = date("Y-m-d H:i:s");
					$uploadData[$i]['ukuran']	=$fileData['file_size'];
					$uploadData[$i]['type']		=$fileData['file_type'];
					$uploadData[$i]['provinsi']	=$this->input->post('provinsi');

				}
			}
			if(!empty($uploadData)){
				//Insert files data into the database

				$insert = $this->gambar->insert($uploadData);
				$statusMsg = $insert?'<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Terimakasih!</h4>
                     <p>Foto berhasil di Upload. </p></div>':'<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <p>Terjadi Kesalahan, Silahkan coba lagi.</p></div>';
				$this->session->set_flashdata('statusMsg',$statusMsg);
			}
		}
		//get files data from database

        //$data['gambar'] = $this->gambar->getRows();
		//pass the files data to view
		$this->load->model('model_provinsi');
    	$data['default_provinsi']		=$this->model_provinsi->default_provinsi();
		$data['gambar']					=$this->model_provinsi->get_all_provinsi();
		$this->load->view('admin/upload/add_mass', $data);
	}

    function single_upload_library (){
    	$this->load->model('model_provinsi');
    	$data['default_provinsi']		=$this->model_provinsi->default_provinsi();
		$data['gambar']					=$this->model_provinsi->get_all_provinsi();
		
		$this->load->view('admin/upload/add_single',$data, array('error' => ' ' ));
	}

    function single_upload() //fungsi upload
    {
    	//$this->load->model('gallery','gambar');
    	$config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']             = 10000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/upload/add_single', $error);
                }
                else
                {
                        $hasil	= $this->upload->data();
                        $this->load->helper(array('form', 'url'));

                		$this->load->library('form_validation');

		                $this->form_validation->set_rules('judul', 'Judul', 'required',
		                        array('required' => '%s tidak boleh kosong.'));
		                $this->form_validation->set_rules('keterangan', 'Keterangan', 'required',
		                        array('required' => '%s tidak boleh kosong.')
		                );

                         if ($this->form_validation->run() == FALSE)
			                {
			                	    $this->load->view('admin/upload/add_single');
			                }
			                else
			                {
	                        $data 	= array(

                        				'nama'			=>	$hasil['file_name'],
                        				'judul'			=>	$this->input->post('judul'),
  										'keterangan'	=>	$this->input->post('keterangan'),
  										'provinsi'		=>	$this->input->post('provinsi'),
        								'ukuran'		=>	$hasil['file_size'],
        								'type'			=>	$hasil['file_type'],
        								'created'		=>	date("Y-m-d H:i:s"),
        								'modified'		=>	date("Y-m-d H:i:s")

                        				);

						$insert=$this->gambar->insert_one($data);

						$statusMsg = $insert?'<div class="alert alert-success alert-dismissable">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <h4>  <i class="icon fa fa-check"></i> Terimakasih!</h4>
	                     <p>Foto berhasil di Upload.</p></div>':'<div class="alert alert-danger alert-dismissable">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	                    <p>Terjadi Kesalahan, Silahkan coba lagi.</p></div>';
						$this->session->set_flashdata('statusMsg',$statusMsg);
						$this->load->model('model_provinsi');
				    	$data['default_provinsi']		=$this->model_provinsi->default_provinsi();
						$data['gambar']					=$this->model_provinsi->get_all_provinsi();
						$this->load->view('admin/upload/add_single',$data);
                        //$this->load->view('admin/upload/upload_sukses', $data);

			                }
                }                   
                
    }
    //UNTUK UPLOAD SELESAI//
	
 

	//BARIS UNTUK LIBRARY MEDIA SELESAI//

	//BARIS UNTUK KATEGORI SELESAI//
}