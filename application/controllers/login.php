<?php
	class Login extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->Model("User_model");
		}
		
		public function index()
		{
			$this->form_validation->set_rules("username","User name","trim|required|xss_clean");
			$this->form_validation->set_rules("password","Password","trim|required|xss_clean");
			if($this->form_validation->run() == FALSE)
			{
			$this->load->view('website/login/login_form');
			}
			else
			{
			$temp = $this->User_model->check_user();
			$affrow = $temp['rows']; 
			$uinfo = $temp['dat'] ;
			if($affrow==1)
			{
            $this->session->set_userdata($uinfo);
            $ck = $this->input->post('remem');
            if(!empty($ck))
            {
                $ck1 = array(
                    'name' => 'user_id',
                    'value' => $temp['dat']['user_id'],
                    'expire' => '1000000',
                    
                    
                );
                
                $ck2 = array(
                    'name' => 'user_name',
                    'value' => $temp['dat']['name'],
                    'expire' => '1000000',
                   
                );
                
                $ck3 = array(
                    'name' => 'password',
                    'value' => $temp['dat']['password'],
                    'expire' => '1000000',
                
                );
                
                $this->input->set_cookie($ck1);
                $this->input->set_cookie($ck2);
                $this->input->set_cookie($ck3);
            }
            redirect(base_url('index'));
			}
			else
			{
			$data['msg'] = "Thông tin tài khoản của bạn không chính xác. Xin vui lòng nhập lại";
			$this->load->view('website/login/login_form',$data);
			}
			}
			}
	}
?>