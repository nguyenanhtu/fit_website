<?php
	class Account extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('User_model');
			$this->load->helper(array('form', 'url'));
		 	$this->load->library('form_validation'); 
		 
		}

		public function show_acc_detail(){
			$uid = $this->session->userdata('user_id');
			$this->do_upload($uid);
		}
		public function edit_acc(){
			$uid = $this->session->userdata('user_id');
			$data['dat']= $this->User_model->edit_acc($uid);
			$this->form_validation->set_rules('name','Họ tên','required');
			//$this->form_validation->set_rules('birthday','Ngày sinh','required');
			$this->form_validation->set_rules('email','email','required|valid_email');
			
			
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view("website/account/edit_acc_view",$data);
			}
			else
			{
				$affrow = $this->User_model->update($uid);
				if($affrow > 0)
				{
						$data['mess']="OK!";
				$data['dat']=$this->User_model->show_acc_detail($uid);
				$this->load->view("website/account/account_detail",$data);
				}
			}
		}
		//UP LOAD
	 public function upload_form()
	{
		$data['error'] = "ERROR";
		$this->load->view('site/upload_form',$data);
	}

	public function do_upload($uid)
	{
		$config['upload_path'] = './public/upload/image/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']	= '10000';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('avatar'))
		{
			$error = array('error' => $this->upload->display_errors());
			$data['dat'] = $this->User_model->show_acc_detail($uid);
			$this->load->view('website/account/account_detail', $data);
		}
		else
		{
			$temp = $this->upload->data();
			$this->User_model->update_avatar($uid, $temp['file_name']);
			$data['anhdaidien'] = $temp;
			$data['dat'] = $this->User_model->show_acc_detail($uid);
			$this->load->view('website/account/account_detail', $data);
		}
	}
		
}

?>