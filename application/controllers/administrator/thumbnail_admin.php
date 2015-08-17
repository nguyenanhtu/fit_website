<?php
	class Thumbnail_admin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->view("Articles_model");
		}
		
		public function index()
		{
			$data['dat'] = $this->Articles_model->show_all();
			$this->load->view('administrator/thumbnail/index',$data);
		}
		
		public function do_upload()
		{
			$config1['upload_path'] = './public/upload/original_image/';
			$config1['allowed_types'] = 'gif|jpg|png|jpeg';
			$config1['max_size']	= '10000';
			$config1['encrypt_name'] = 'true';
			$this->load->library('upload',$config1);
			$this->upload->do_upload('image');
			$file_in = $this->upload->data();
		
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = $file_in['full_path'];
			$config2['create_thumb'] = TRUE;
			$config2['maintain_ratio'] = TRUE;
			$config2['width'] = 150;
			$config2['height'] = 100;
			$config2['new_image'] = './public/upload/thumb_image';
		
			$this->load->library('image_lib', $config2); 
			$this->image_lib->resize();
			$file_name = $file_in['raw_name'].'_thumb'.$file_in['file_ext'];
			return $file_name;
		}
	}
?>