<?php
	class File_model extends CI_Model{
		public function __construct(){
		parent::__construct();
		$this->load->database();
		} 
		public function show(){
			/*$ten = $this->db->query("SELECT articles.title FROM articles INNER JOIN resources ON articles.article_id=resources.article_id");
			$data=array(
	                    "rid" => $this->input->post("rid"),
	                    "name" => $this->input->post("name"),
						"status" => $this->input->post("status"),
						"type" => $this->input->post("type"),
						"article_id" => $ten
        );
			$query = $this->db->get_where('resources', $data);*/
			
			$q = "Select rid, resources.name AS rname, type, resources.status, title, users.name AS uname";
			$q .= " From resources, articles, users";
			$q .= " Where articles.article_id = resources.article_id And resources.user_id = users.user_id";
			$query = $this->db->query($q);
			$result = $query->result_array();
			return $result;
		}
		
		public function unpublish_res($rid){
			$data = array(
				'status' => FALSE
			);
			$this->db->where('rid',$rid);
			$this->db->update('resources',$data);
		}
		public function publish_res($rid){
			$data = array(
				'status' => TRUE
			);
			$this->db->where('rid',$rid);
			$this->db->update('resources',$data);
		}
		
		public function show_one_file($rid){
			$query = $this->db->get_where("resources", array('rid'=>$rid));
			return $query->row_array();
		}
		
	}

?>