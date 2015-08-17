<?php
	class Users extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->Model('User_model');
			$this->load->library('utilclass');
			$this->load->Model('Articles_model');
		}
		
		public function log_out()
		{
			$this->session->sess_destroy();
			$this->load->view("website/common/header");
			echo "<h2> You are now logged out </h2>";
			$this->load->view("website/common/footer");
		}
		
		
		public function profile2()
		{
			if($this->utilclass->check_user())
			{
        
			$temp = $this->User_model->get_info($this->session->userdata('user_id'));
			$data['user'] = $temp['result'];
			$data['web'] = $this->User_model->get_web_link($this->session->userdata('user_id'));
			if($temp['affrow']==1)
			{
				$this->load->view("website/account/account_view",$data);
			}
			else
			{
				echo "404 Error. Bạn không có quyền truy cập account này";
			}
			}
			else
			{
				redirect('index','refresh');
			}
			
		}
		
		public function list_users()
		{
			$data['users'] = $this->User_model->show_list();
			$this->load->view("website/account/list_user",$data);
		}
		
		//Hàm này để show thông tin một user cho user khác xem (ko phải
		//xem chính tài khoản của mình
		public function user_info()
	{
		$ck_user = $this->utilclass->check_user();
		if($ck_user==TRUE)
		{
		$uid = $this->uri->segment(3);
		$temp = $this->User_model->get_info($uid);
		$data['user'] = $temp['result'];
		$this->form_validation->set_rules('content','Message','trim|required|xss_clean');
		if($this->form_validation->run()==false)
		{
			$this->load->view("website/account/user_form",$data);
		}
		else
		{
			$from_user = $this->input->post('from_user');
			$mess = $this->input->post('content');
			$this->User_model->insert_message($uid,$from_user,$mess);
			$this->load->view("website/account/user_form",$data);
		}
		}
		else
		{
			redirect('home','refresh');
		}
		
	}
	
	public function send_article()
	{
		$data['prepare'] = $this->Articles_model->prepare_dat();
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('catid','Category','required');
		$this->form_validation->set_rules('content','Content','required');
		//$this->load->view("website/account/insert_article");
		if($this->form_validation->run() === FALSE)
		{
			//$data['ck'] = 'failed';
			$this->load->view("website/account/insert_article",$data);
		}
		else
		{
			$fdata = $this->do_multi_upload();
			$uid = $this->session->userdata('user_id');
			$level = $this->session->userdata('user_level');
			$this->Articles_model->insert_from_user($fdata,$uid,$level);
			$data['ck'] = 'success';
			$data['msg'] = 'Tạo bài viết mới thành công';
				//print_r($fdata);
			$this->load->view("website/account/insert_article",$data);
		}
	
	}
	
	
	//Hiển thị các bài viết chưa được duyệt của users
	public function show_articles()
	{
		$uid = $this->session->userdata('user_id');
		$data['dat'] = $this->User_model->show_articles_user($uid);
		$this->load->view("website/account/list_article",$data);
	}
	
	public function edit_article()
	{
		$aid = $this->uri->segment(3);
		$data['dat'] = $this->User_model->show_detail_article($aid);
		$data['prepare'] = $this->Articles_model->prepare_dat();
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('catid','Category','required');
		$this->form_validation->set_rules('content','Content','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view("website/account/edit_article",$data);
		}
		else
		{
			$fdata = $this->do_multi_upload();
			$uid = $this->session->userdata('user_id');
			$affrow = $this->User_model->update_article($aid,$fdata,$uid);
			if($affrow >0)
			{
				$data['msg'] = "Đã update bài viết thành công";
				$data['ck'] = "success";
				$this->load->view("website/account/edit_article",$data);
			}
			else
			{
				$data['msg'] = "Đã có lỗi xảy ra. Hãy thử lại";
				$data['ck'] = "failed";
				$this->load->view("website/account/edit_article",$data);
			}
		}
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
		
		//Người dùng quên password cũ, cần cấp pass mới
		//Do chúng ta lưu password trong database dưới dạng đã mã
		//hóa (SHA1) nên không thể giải mã được. Do đó bắt buộc
		//phải cấp cho người dùng một mật khẩu ngẫu nhiên mới
		//chứ ko thể dùng mật khẩu cũ
    public function retrieve_pass()
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'nguyenanhtuk60b@gmail.com',
            'smtp_pass' => 'chuatebongtoi',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE     
        );
        $this->form_validation->set_rules("email","Email","required|valid_email|xss_clean");
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('website/account/retrieve_pass_form');
        }
        else
        {
            $temp = $this->User_model->check_pass();
            $affrow = $temp['rows']; 
            $uinfo = $temp['dat'] ;
            
            if($affrow==1)
            {
               $temp_pass = substr(md5(uniqid(rand(),true)),0,8);
               $affrows2 = $this->User_model->up_pass($temp_pass);
               if($affrows2==1)
               {
            $content = "Xin chào bạn {$uinfo['first_name']} {$uinfo['last_name']}.Đây là password tạm thời của bạn. Hãy dùng nó để đăng nhập  \n\n";
            $content .= "Password : ".$temp_pass;
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('nguyenanhtuk60b@gmail.com','Admin'); // change it to yours
            $this->email->to($this->input->post('email'));// change it to yours
            $this->email->subject('Re-password at fit.hnue.edu.vn');
            $this->email->message($content);  
             if($this->email->send())
            {
            //$this->load->view('templates/register_view/success');
            $data['msg'] = "Một email kèm theo pass đã được gửi đến mail của bạn. Hãy kiểm tra";
            $data['ck'] = "success";
            $this->load->view('website/account/retrieve_pass_form',$data);
            }
            else
            {
            show_error($this->email->print_debugger());
            }
                
               }
               else
               {
                $data['msg'] = "Đã xảy ra lỗi ko thể cung cấp pass mới. Hãy thử lại";
                $data['ck'] = "failed";
                $this->load->view('website/account/retrieve_pass_form',$data);
               }
                
            }
            else
            {
                
            $data['msg'] = "Email này không tồn tại trong hệ thống";
            $data['ck'] = "failed";
            $this->load->view('website/account/retrieve_pass_form',$data);
            }
            
            
        }
    }
	
	public function list_teacher()
	{
		$temp = $this->User_model->show_teachers();
		$data['dat'] = $temp['result'];
		$data['affrow'] = $temp['affrow'];
		$this->load->view("website/present/list_lectures",$data);
	}
	}
?>