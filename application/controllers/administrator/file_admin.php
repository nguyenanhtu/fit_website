<?php
	class File_admin extends CI_Controller{
		public function __construct(){
		parent::__construct();
		$this->load->Model('File_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation'); 
		}
		public function index(){
			$ck = $this->input->post('submitform');
			$this->form_validation->set_rules('rid', 'Ô Check', 'required');
			if($this->form_validation->run() === FALSE)
			{
				$data['dat']= $this->File_model->show();
				$this->load->view("administrator/file_view",$data);
			}
			else{
				switch($ck){
					case 'unpublish':
						$this->unpublish();
						$data['dat']= $this->File_model->show();
						$this->load->view("administrator/file_view",$data);
						break;
					case 'publish':
						$this->publish();
						$data['dat']= $this->File_model->show();
						$this->load->view("administrator/file_view",$data);
						break;
				}
				
			}
		}
		public function unpublish(){
			$ck = $this->input->post('rid');
			$this->File_model->unpublish_res($ck);
			
		}
		public function publish(){
			$ck = $this->input->post('rid');
			$this->File_model->publish_res($ck);
			
		}
		
		public function download(){
			$rid = $this->uri->segment(4);
			$data['file'] = $this->File_model->show_one_file($rid);
			$this->load->view('administrator/down_view',$data);
		}
		
		
	}
?>