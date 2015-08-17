<?php
	class User_admin extends CI_Controller{
	
	
		public function __construct(){
		parent::__construct();
		$this->load->Model('User_model');
		$this->load->helper(array('form', 'url'));
		 $this->load->library('form_validation'); 
		}
		
		
		public function index(){
			$check=$this->input->post("submitform");
			$this->form_validation->set_rules('uid[]','CHECK','required');
			
			if($this->form_validation->run() == FALSE){
				$data['dat']= $this->User_model->show();
				$this->load->view("administrator/user_view",$data);
			}
			else{
				switch($check)
				{
					case 'delete':
						$this->deleteuser();
						$data['dat']= $this->User_model->show();
						$this->load->view("administrator/user_view",$data);
						break;
					case 'unpublish':
						$this->unpublish();
						$data['dat']= $this->User_model->show();
						$this->load->view("administrator/user_view",$data);
						break;
					case 'publish':
						$this->publish();
						$data['dat']= $this->User_model->show();
						$this->load->view("administrator/user_view",$data);
						break;
				}
			}
		}
		
		public function unpublish(){
			$ck = $this->input->post('uid');
			$this->User_model->unpublish_user($ck);
			
		}
		public function publish(){
			$ck = $this->input->post('uid');
			$this->User_model->publish_user($ck);
			
		}
		
		public function check_birthday(){
			$ngay = $this->input->post("slngay");
			$thang = $this->input->post("slthang");
			$nam = $this->input->post("slnam");
			$error ="";
			if($thang==2 && ($ngay!=31||$ngay!=29)){
				$error = "Xin vui lòng nhập lại ngày sinh!";
			}
			return $error;
		}
		public function adduser(){
		 	
			$this->form_validation->set_rules('user_name','Username','required|is_unique[users.user_name]');
			
			//$this->form_validation->set_rules('birthday','Ngày sinh','required');
			$this->form_validation->set_rules('status','Trạng thái','required');
			$this->form_validation->set_rules('name','Họ và Tên','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('email','email','required|valid_email');
			$this->form_validation->set_rules('user_level','User level','required');
			$this->form_validation->set_rules('department','department','required');
			if($this->form_validation->run() == FALSE)
			{
				$data['error'] = $this->check_birthday();	
				$this->load->view("administrator/adduser_view");
			}
			else
			{
				
				$data['error'] = $this->check_birthday();
				$this->User_model->add();
				$data['dat']= $this->User_model->show();
				$this->load->view("administrator/user_view",$data);
			}

			
			
		}
		public function edituser(){
			$uid = $this->uri->segment(4);
			$data['result']= $this->User_model->edit($uid);
			$this->form_validation->set_rules('user_name','Họ tên','required');
			$this->form_validation->set_rules('name','Họ và tên','required');
			$this->form_validation->set_rules('status','Trạng thái','required');
			//$this->form_validation->set_rules('birthday','Ngày sinh','required');
			$this->form_validation->set_rules('email','email','required|valid_email');
			$this->form_validation->set_rules('user_level','User level','required');
			$this->form_validation->set_rules('department','Đơn vị','required');
			
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view("administrator/edit_view",$data);
			}
			else
			{
				$affrow = $this->User_model->update($uid);
				if($affrow > 0)
				{
						$data['mess']="OK!";
				$data['dat']= $this->User_model->show_all_users();
				$this->load->view("administrator/user_view",$data);
				}
			}
	
		}
		public function deleteuser(){
			//$did = $this->uri->segment(4);
			$did = $this->input->post("uid");
			$this->User_model->delete($did);
			
			 
			//$this->load->view("admin/delete_view",$data);
		}
	}
?>