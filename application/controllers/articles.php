<?php
	class Articles extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->Model("Categories_model");
			$this->load->Model("Articles_model");
			$this->load->Model("Resources_model");
		}
		
		/*
			Tuân thủ nguyên tắc : Chỉ cần một module Articles có
			thể show toàn bộ nội dung các module khác như tin tức, 
			sự kiện, giới thiệu, ko cần viết quá nhiều module.
		*/
		public function index()
		{
			$cat = "Tin mới";
			$data['cat_title'] = $cat;
			$data['dat'] = $this->Articles_model->show_news($cat);
			$temp = $this->Categories_model->select_parent_id();
			$temp2 = array();
			$temp3 = array();
			for($i=0;$i<sizeof($temp);$i++)
			{
				$temp2[$i] = $this->Categories_model->show_subcat($temp[$i]['parent_id']);
				$temp3[$i] = $this->Categories_model->show_parent($temp[$i]['parent_id']);
			}
			
			$temp4 = $this->Categories_model->show_not_parent();
			$data['temp2'] = $temp2;
			$data['temp3'] = $temp3;
			$data['temp4'] = $temp4;
			$this->load->view("website/news/index",$data);
		}
		
		public function most_view_posts()
		{
			$temp4 = $this->Articles_model->show_most_visit_articles();
			return $temp4;
		}
		
		public function detail()
		{
			$aid = $this->uri->segment(3);
			$temp5 = $this->Articles_model->get_count($aid);
			$curr_count = $temp5['count_view'];
			$this->count_view($aid,$curr_count);
			$temp = $this->Articles_model->show_detail($aid);
			$list = $this->Resources_model->show_file($aid);
			$temp4 = $this->Articles_model->show_most_visit_articles();
			$data['dat'] = $temp;
			$data['dat2'] = $this->Articles_model->show_related_posts($temp['cat_id'],$aid);
			$data['list'] = $list;
			$data['most'] = $temp4;
			$this->load->view("website/news/detail_news",$data);
		}
		
		public function download()
		{
			$rid = $this->uri->segment(3);
			$data['file'] = $this->Resources_model->show_one_file($rid);
			$this->load->view("website/news/down_view",$data);
		}
		
		public function count_view($aid,$curr_count)
		{
		
			/*Ở đây thực chất một user khi truy cập website chỉ được tạo
			một session duy nhất lưu dưới dạng cookie ở máy khách (khoảng
			4 KB), tuy nhiên cứ mỗi khi truy cập một bài viết, mảng session
			của user sẽ thay đổi như thế này, ví dụ :
			Trước khi truy cập bài có id =12
			[array]
(
'session_id' => random hash,
'ip_address' => 'string - user IP address',
'user_agent' => 'string - user agent data',
'last_activity' => timestamp,
'17'=> 'lượt xem', Đây là dữ liệu lượt xem các bài viết trước đó của user này
'18' => 'lượt xem')

			Sau khi truy cập bài có id = 12 
					[array]
(
'session_id' => random hash,
'ip_address' => 'string - user IP address',
'user_agent' => 'string - user agent data',
'last_activity' => timestamp,
'17'=> 'lượt xem', Đây là dữ liệu lượt xem các bài viết trước đó của user này
'18' => 'lượt xem'
'12' => 1)

Và cứ mỗi lần người đó truy cập vào bài bài viết có id= 12, lượt xem sẽ tự động tăng 
thêm 1 lần. Do không lưu trữ 
		
			*/
			
			//Lấy ra giá trị view hiện tại của hệ thống, sau
			//đó với mỗi user chỉ chấp nhận lượt view đầu, những
			//lượt sau sẽ không được công thêm vào
			if($this->session->userdata("$aid")==FALSE)
			{
				$this->session->set_userdata("$aid",1);
				$c = $curr_count + 1;
				$this->Articles_model->count_model($aid,$c);
			
			}
			/*else
			{
				//Ko dùng chung một biến session tên counter nữa
				//vì nó sẽ update lượt xem cho tất cả các bài viết.
				$count = $this->session->userdata("$aid");
				$count++;
				$c = $curr_count + $count;
				$this->session->set_userdata("$aid",$count);
			
				$this->Articles_model->count_model($aid,$c);
			}*/
		}
		
		//Hàm hiển thị các thông báo
		public function notice()
		{
			$cat = "Thông báo";
			$data['cat_title'] = $cat;
			$data['most'] = $this->most_view_posts();
			$data['dat'] = $this->Articles_model->show_news($cat);
			$temp = $this->Categories_model->select_parent_id();
			$temp2 = array();
			$temp3 = array();
			for($i=0;$i<sizeof($temp);$i++)
			{
				$temp2[$i] = $this->Categories_model->show_subcat($temp[$i]['parent_id']);
				$temp3[$i] = $this->Categories_model->show_parent($temp[$i]['parent_id']);
			}
			
			$temp4 = $this->Categories_model->show_not_parent();
			$data['temp2'] = $temp2;
			$data['temp3'] = $temp3;
			$data['temp4'] = $temp4;
			$this->load->view("website/news/index",$data);
		}
		
		public function jobs()
		{
			$cat = "Việc làm";
			$data['cat_title'] = $cat;
			$data['dat'] = $this->Articles_model->show_news($cat);
			$this->load->view("website/news/index",$data);
		}
		
		public function soluoc()
		{
			$cat = "Giới thiệu sơ lược";
			$data['cat_title'] = $cat;
			$data['dat'] = $this->Articles_model->show_news($cat);
			$this->load->view("website/news/index",$data);
		}
		
		public function history()
		{
			$cat = "Lịch sử phát triển";
			$data['cat_title'] = $cat;
			$data['dat'] = $this->Articles_model->show_news($cat);
			$this->load->view("website/news/index",$data);
		}
		
		public function tech_news()
		{
			$cat = "Tin Công nghệ";
			$data['cat_title'] = $cat;
			$data['dat'] = $this->Articles_model->show_news($cat);
			$this->load->view("website/news/index",$data);
		}
		
		public function duhoc()
		{
			$cat = "Du học - Học bổng";
			$data['cat_title'] = $cat;
			$data['dat'] = $this->Articles_model->show_news($cat);
			$this->load->view("website/news/index",$data);
		}
		
		public function daihoc()
		{
			$data['dat']= $this->Articles_model->show_dt_daihoc();
			$this->load->view("website/daotao/dt_daihoc_view",$data);
		}
		
		public function linhvucnghiencuu()
		{
			$data['dat']= $this->Articles_model->show_nc_linhvuc();
			$this->load->view("website/nghiencuu/nc_linhvuc_view",$data);
		}
		public function tailieumonhoc()
		{
			$data['dat']= $this->Articles_model->show_tlmonhoc();
			$this->load->view("website/tainguyen/monhoc_view",$data);
		}
		
		public function lienhe()
		{
			
			$this->load->view("website/lienhe");
		}
		
		
	}
?>