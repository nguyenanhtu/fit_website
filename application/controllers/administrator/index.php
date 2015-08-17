<?php
	class Index extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->Model("User_model");
			$this->load->library('utilclass');
		}
		
		public function index()
		{
			$this->form_validation->set_rules("username","Username","trim|required|xss_clean");
			$this->form_validation->set_rules("password","Password","trim|required|xss_clean");
			$this->form_validation->set_message('required','Bạn không được để trống trường %s');
			if($this->form_validation->run()== FALSE)
			{
			$this->load->view("administrator/login_view");
			}
			else
			{
			$temp = $this->User_model->check_user_admin();
			$affrow = $temp['rows']; 
			$uinfo = $temp['dat'] ;
			if($affrow==1)
			{
				$this->session->set_userdata($uinfo);
				redirect("/administrator/index/home",'refresh');
			}
			else
			{
				$data['msg'] = "Thông tin tài khoản admin của bạn không chính xác. Xin vui lòng nhập lại";
				$this->load->view("administrator/login_view",$data);
			}
			}	
		}
		
		public function home()
		{
			$check = $this->utilclass->check_admin();
			if($check==TRUE)
			{
			$this->load->view("administrator/index");
			}
			else
			{
				echo "404 Error. Bạn ko có quyền truy cập trang này";
			}
		}
	}
?>