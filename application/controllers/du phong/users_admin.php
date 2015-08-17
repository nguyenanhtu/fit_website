<?php
	class Users_admin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->Model('User_model');
			$this->load->library('excel');
		}
		
		public function index()
		{
			$data['dat'] = $this->User_model->show_all_users();
			$this->load->view("administrator/users/index",$data);
			
		}
		
		public function do_upload()
		{
			$config1['upload_path'] = './public/upload/list_users/';
			$config1['allowed_types'] = 'xls|csv|pdf';
			$config1['max_size']	= '10000';
			$config1['encrypt_name'] = 'true';
			$this->load->library('upload',$config1);
			$this->upload->do_upload('list');
			$file_in = $this->upload->data();
			$path = $file_in['full_path'];
			echo "<pre>";
			print_r($file_in);
			echo "</pre>";
			$this->insert_dat($path);

		}
		
		public function add_list()
		{
			$this->load->view("administrator/users/add_list");
		}
		
		public function insert_dat($path)
		{
			$objReader = PHPExcel_IOFactory::createReader('Excel5');
			$objPHPExcel = $objReader->load($path);
			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
			foreach($sheetData as $dat)
			{
				if($dat['A'] =="user_name")
				{
					continue;
				}
				$this->User_model->insert($dat);
				
			}
			$data['dat'] = $this->User_model->show_all_users();
			$this->load->view("administrator/users/index",$data);
		}
		
		
	}
?>