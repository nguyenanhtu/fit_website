<?php
	class Resources_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function show_file($aid)
		{
			$query = $this->db->get_where("resources",array("article_id" => $aid,'status' => TRUE));
			return $query->result_array();
		}
		
		public function show_one_file($rid)
		{
			$query = $this->db->get_where("resources",array('rid' => $rid));
			return $query->row_array();
		}
	}
?>