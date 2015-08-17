<?php
	class Search extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->Model('Articles_model');
		}
		
		public function search_keyword()
		{
			$keyword = $this->input->post('keyword');
			$data['key'] = $keyword;
			$data['result'] = $this->Articles_model->search($keyword);
			$this->load->view("website/search/search_view",$data);
		}
	}
?>