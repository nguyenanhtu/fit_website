<?php
	class Articles_admin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->Model("Articles_model");
			$this->load->library('utilclass');
		}
		
		public function index()
		{
			//chỉ cần kiểm soát link trang index
			$check = $this->utilclass->check_admin();
			if($check==TRUE)
			{
			$ck = $this->input->post('submitform');
			$this->form_validation->set_rules('aid[]','Ô check','required');
			if($this->form_validation->run() === FALSE)
			{
			$data['dat'] = $this->Articles_model->show_all();
			$this->load->view('administrator/articles/index',$data);
			}
			else
			{
			switch($ck)
				{
					case 'unpublish':
						$this->unpublish();
						$data['dat'] = $this->Articles_model->show_all();
						$this->load->view("administrator/articles/index",$data);
						break;
					case 'publish':
						$this->publish();
						$data['dat'] = $this->Articles_model->show_all();
						$this->load->view("administrator/articles/index",$data);
						break;
					case 'del':
						$this->delete();
						//$data['dat'] = $this->Articles_model->show_all();
						//$this->load->view("administrator/articles/index",$data);
						break;
				}
			}
			}
			else
			{
				echo "404 Error. Bạn ko có quyền truy cập trang này";
			}
			
		}
		
		public function delete()
		{
			$ck = $this->input->post('aid');
			//$dat = array();
			for($i=0;$i<sizeof($ck);$i++)
			{
			if($ck[$i] == 1)
			{
				$data['prevent'] =  "<script type='text/javascript'>
							alert('Rất tiếc. Bạn không được quyền xóa bài viết Root.');
				      </script>
				";
				$data['dat'] = $this->Articles_model->show_all();
				$this->load->view('administrator/articles/index',$data);
				
			}
			else
			{
				$this->Articles_model->del_article($ck[$i]);
				$data['dat'] = $this->Articles_model->show_all();
				$this->load->view('administrator/articles/index',$data);
			}
			}
		}
		
		public function unpublish()
		{
		
			$ck = $this->input->post('aid');
			$dat = array();
			for($i=0;$i<sizeof($ck);$i++)
			{
			$dat[$i] = $this->Articles_model->show_articles($ck[$i]);
			$this->Articles_model->unpublish_art($ck[$i]);
			}
			/*$data['dat'] = $dat;
			echo "<br/>";
			print_r($dat);*/
		}
		
		public function publish()
		{
		
			$ck = $this->input->post('aid');
			$dat = array();
			for($i=0;$i<sizeof($ck);$i++)
			{
			$dat[$i] = $this->Articles_model->show_articles($ck[$i]);
			$this->Articles_model->publish_art($ck[$i]);
			}
			/*$data['dat'] = $dat;
			echo "<br/>";
			print_r($dat);*/
		}
		
		public function add()
		{
			$data['prepare'] = $this->Articles_model->prepare_dat();
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('catid','Category','required');
			$this->form_validation->set_rules('description','Description','callback_descript_check');
			$this->form_validation->set_rules('status','Status','required');
			$this->form_validation->set_rules('content','Content','required');
			if($this->form_validation->run() === FALSE)
			{
				//$data['ck'] = 'failed';
				$this->load->view("administrator/articles/add_new",$data);
			}
			else
			{
				//Ko thể cùng một lúc vừa upload ảnh thumbnail minh họa
				// vừa upload hệ thống file attachment được.
				
				//Có 2 phương án duy nhất để giải quyết vấn đề :
				/*
					1. Bỏ trường thumbnail trong bảng bài viết (chỉ còn phần attach file)
					2. Tạo riêng một mục "Tạo Thumbnail Image" hoặc "Tạo Attachment File" 
					(nghiêng về phương án này hơn).
				*/
				//$fn = $this->do_upload();
				$fdata = $this->do_multi_upload();
				$fn = $this->process_image();
				$this->Articles_model->insert($fn,$fdata);
				$data['ck'] = 'success';
				$data['msg'] = 'Tạo bài viết mới thành công';
				//print_r($fdata);
				$this->load->view("administrator/articles/add_new",$data);
			}
		}
		
		/*public function do_upload()
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
		}*/
		
		public function process_image()
		{
			$raw_str = trim_slashes($this->input->post("image"));
			$raw_arr = explode("/",$raw_str);
			$filename = end($raw_arr);
			return $filename;
		}
		
		public function do_multi_upload()
		{
			
			$config['upload_path'] = './public/upload/';
			$config['allowed_types'] = 'doc|pdf';
			$config['max_size']	= '100000';
			$this->load->library("upload",$config);
			if($this->upload->do_multi_upload("files"))
			{
				echo "Success";
			}
			else
			{
			echo "FAILED";
			$this->upload->display_errors('<p>', '</p>');
			}
			$fdata = $this->upload->get_multi_upload_data();
			return $fdata;
        //Code to run upon successful upload.
		}
		
		public function edit()
		{
			$aid = $this->uri->segment(4);
			$data['prepare'] =  $this->Articles_model->prepare_dat();
			$data['val'] = $this->Articles_model->show_articles($aid);
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('category','Category','required');
			$this->form_validation->set_rules('description','Description','callback_descript_check');
			$this->form_validation->set_rules('content','Content','required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('administrator/articles/edit',$data);
			}
			else
			{
				$fdata = $this->do_multi_upload();
				$fn = $this->process_image();
				$affrow = $this->Articles_model->update_art($aid,$fn,$fdata);
				if($affrow >0)
				{
					$data['msg'] = "Đã update bài viết thành công";
					$data['ck'] = "success";
					$this->load->view('administrator/articles/edit',$data);
				}
				else
				{
					$data['msg'] = "Đã có lỗi xảy ra. Hãy thử lại";
					$data['ck'] = "failed";
					$this->load->view('administrator/articles/edit',$data);
				}
				
			}
		}
		
		
		//Check trường description không quá 55 chữ
		public function descript_check($str)
		{
			$count = str_word_count($str);
			if($count > 55)
			{
				$this->form_validation->set_message('descript_check', 'Trường %s không thể có quá 55 chữ');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
	}
?>