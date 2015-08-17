<?php
	class Categories_admin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->Model('Categories_model');
			$this->load->library('utilclass');
		}
		
		public function prepare_data()
		{
			$dat = $this->Categories_model->prepare_dat_2();
			return $dat;
		}
		
		public function index()
		{
			$check = $this->utilclass->check_admin();
			if($check==TRUE)
			{
			$ck = $this->input->post('submitform');
			$this->form_validation->set_rules('cid[]','Ô check','required');
			if($this->form_validation->run()===FALSE)
			{
				$this->paging();
			}
			else
			{
				switch($ck)
				{
					case 'unpublish':
						$this->unpublish();
						$this->paging();
						break;
					case 'publish':
						$this->publish();
						$this->paging();
						break;
					case 'delete' :
						$this->delete();
						break;
				}
				
			}
			}
			else
			{
				echo "404 Error. Bạn ko có quyền truy cập trang này";
			}
			
		}
		
		public function paging()
		{
				$this->load->library('pagination');
				//chỉ số id trên url của trang index chính là chỉ số bắt đầu 
				//của bản ghi tiếp theo, vì vậy sẽ bị vênh so với chỉ số trang.
				//Ví dụ ở trang đầu page id sẽ là 0, sau đó có thêm bản ghi số thứ
				//tự 1 (ko phải cat_id) => page id của trang tiếp theo sẽ là 2, page
				//id của trang 3 sẽ là 4 (ko phải 3).
				$config['base_url'] = base_url("administrator/categories_admin/index/");
				$config['total_rows'] = $this->Categories_model->count_all();
				$config['per_page'] = 4;
				$config['uri_segment'] = 4;
				$config['prev_link'] = 'Prev';
				$config['prev_tag_open'] = '<div class="button2-right"><div class="prev">';
				$config['prev_tag_close'] = '</div></div>';
				$config['next_link'] = 'Next';
				$config['next_tag_open'] = '<div class="button2-left"><div class="next">';
				$config['next_tag_close'] = '</div></div>';
				/*$config['cur_tag_open'] = '<div class="button2-left"><div class="page">';
				$config['cur_tag_close'] = '</div></div>';
				$config['num_tag_open'] = '<div class="button2-left"><div class="page">';
				$config['num_tag_close'] = '</div></div>';*/
				
				$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
				$this->pagination->initialize($config);
				//$data['dat'] = $this->prepare_data();
				$data['dat'] = $this->Categories_model->list_count($page,$config['per_page']);
				$this->load->view("administrator/categories/index",$data);
		}
		
		public function add()
		{
			$data['prepare'] =  $this->Categories_model->prepare_dat();
			$this->form_validation->set_rules('title','title','required');
			$this->form_validation->set_rules('status','status','required');
			$this->form_validation->set_rules('content','description','required');
			$data['title'] = "Tạo Category";
			if($this->form_validation->run() === FALSE)
			{
				//$data['ck'] = 'failed';
				$this->load->view("administrator/categories/add_new",$data);
			}
			else
			{
				$this->Categories_model->insert();
				$data['ck'] = 'success';
				$data['msg'] = 'Tạo danh mục mới thành công';
				$this->load->view("administrator/categories/add_new",$data);
			}
		}
		
		public function delete()
		{
			$ck = $this->input->post('cid');
			//$dat = array();
			for($i=0;$i<sizeof($ck);$i++)
			{
			if($ck[$i] == 1)
			{
				$data['prevent'] =  "<script type='text/javascript'>
							alert('Rất tiếc. Bạn không được quyền xóa danh mục Root.');
				      </script>
				";
				$this->paging();
				
				
			}
			else
			{
				$this->Categories_model->del_cat($ck[$i]);
				$this->paging();
			}
			}
		}
		
		public function unpublish()
		{
		
			$ck = $this->input->post('cid');
			$dat = array();
			for($i=0;$i<sizeof($ck);$i++)
			{
			$dat[$i] = $this->Categories_model->show_cats($ck[$i]);
			$this->Categories_model->unpublish_cat($ck[$i]);
			}
			/*$data['dat'] = $dat;
			echo "<br/>";
			print_r($dat);*/
		}
		
		public function publish()
		{
		
			$ck = $this->input->post('cid');
			$dat = array();
			for($i=0;$i<sizeof($ck);$i++)
			{
			$dat[$i] = $this->Categories_model->show_cats($ck[$i]);
			$this->Categories_model->publish_cat($ck[$i]);
			}
			/*$data['dat'] = $dat;
			echo "<br/>";
			print_r($dat);*/
		}
		
		public function edit()
		{
			//Do còn thêm tiền tố là folder administrator
			$pid = $this->uri->segment(4);
			$data['prepare'] =  $this->Categories_model->prepare_dat();
			$data['val'] = $this->Categories_model->show_cats($pid);
			$this->form_validation->set_rules('title','title','required');
			$this->form_validation->set_rules('status','status','required');
			$this->form_validation->set_rules('content','description','required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('administrator/categories/edit',$data);
			}
			else
			{
				$affrow = $this->Categories_model->update_cat($pid);
				if($affrow >0)
				{
					$data['msg'] = "Đã update thành công";
					$data['ck'] = "success";
					$this->load->view('administrator/categories/edit',$data);
				}
				else
				{
					$data['msg'] = "Đã có lỗi xảy ra. Hãy thử lại";
					$data['ck'] = "failed";
					$this->load->view('administrator/categories/edit',$data);
				}
				
			}
		}
		
		public function process()
		{
			//tạo một hàm process chủ, nếu yêu cầu đến từ submit button nào
			//thì sẽ gọi đến các hàm con, chẳng hạn hàm unpublish để xử lý
			
		}
	}
?>