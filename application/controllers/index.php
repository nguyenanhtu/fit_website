<?php
	class Index extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->Model("Articles_model");
		}
		
		public function index()
		{
			//$data['dat'] = $this->Articles_model->show_list();
			$temp1 = $this->Articles_model->show_news_home();
			$temp2 = $this->Articles_model->show_event_home();
			$temp3 = $this->Articles_model->show_notice_home();
			$temp4 = $this->Articles_model->show_most_visit_articles();
			$data['news'] = $temp1;
			$data['event'] = $temp2;
			$data['notice'] = $temp3;
			$data['most'] = $temp4;
			$data['related_news'] = $this->Articles_model->show_list($temp1['article_id']);
			$data['related_events'] = $this->Articles_model->show_related_posts($temp2['cat_id'],$temp2['article_id']);
			$data['related_notice'] = $this->Articles_model->show_related_posts($temp3['cat_id'],$temp3['article_id']);
			$this->load->view("website/index",$data);
		}
	}
?>