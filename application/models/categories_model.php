<?php
	class Categories_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		public function prepare_dat()
		{
			$query = $this->db->get('categories');
			$result = $query->result_array();
			$rows = $query->num_rows();
			return $result;	
		}
		
		public function prepare_dat_2()
		{
			$sql = "Select c1.cat_id as childId, c1.cat_name as childName, c1.description as childDesc, c1.status as childStatus, c2.cat_name as parentName, c2.cat_id AS parent_id ";
			$sql .= " From categories c1 LEFT OUTER JOIN categories c2";
			$sql .= " On c1.parent_id = c2.cat_id";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		}
		
		public function select_parent_id()
		{
			$q = "Select distinct parent_id from categories";
			$query = $this->db->query($q);
			return $query->result_array();
		}
		
		public function show_parent($pid)
		{
			$q = "Select * from categories where cat_id = ?";
			$query = $this->db->query($q,array($pid));
			return $query->row_array();
		}
		
		public function show_subcat($pid)
		{
			$q = "Select * from categories where parent_id = ?";
			$query = $this->db->query($q,array($pid));
			return $query->result_array();
		}
		
		
		public function show_not_parent()
		{
			$q = "Select * from categories Where cat_id NOT IN(Select parent_id From categories) AND parent_id = 1";
			$query = $this->db->query($q);
			return $query->result_array();
		}
		
		public function insert()
		{
			$data = array(
				'parent_id' => $this->input->post('parent'),
				'cat_name' => $this->input->post('title'),
				'description' => $this->input->post('content'),
				'status' => $this->input->post('status')
			);
			
			$this->db->insert('categories',$data);
		}
		
		public function show_cats($cid)
		{
			$query = $this->db->get_where('categories', array('cat_id' => $cid));
			$result = $query->row_array();
			return $result;
		}
		
		public function unpublish_cat($cid)
		{
			$data = array(
				'status' => FALSE
			);
			
			$this->db->where('cat_id',$cid);
			$this->db->update('categories',$data);
		}
		
		public function publish_cat($cid)
		{
			$data = array(
				'status' => TRUE
			);
			
			$this->db->where('cat_id',$cid);
			$this->db->update('categories',$data);
		}
		
		public function update_cat($cid)
		{
			$data = array(
				'parent_id' => $this->input->post('parent'),
				'cat_name' => $this->input->post('title'),
				'description' => $this->input->post('content'),
				'status' => $this->input->post('status')
			);
			
			$this->db->where('cat_id',$cid);
			$this->db->update('categories',$data);
			$affrow = $this->db->affected_rows();
			return $affrow;
		}
		
		public function count_all()
		{
			return $this->db->count_all('categories');
		}
		
		public function list_count($number, $offset)
		{
			/*$query = $this->db->get("categories",$number,$offset);
			return $query->result_array();*/
			//$number là chỉ số bắt đầu bản ghi show ra
			//$offset là số lượng bản ghi trong một trang
			$sql = "Select c1.cat_id as childId, c1.cat_name as childName, c1.description as childDesc, c1.status as childStatus, c2.cat_name as parentName";
			$sql .= " From categories c1 LEFT OUTER JOIN categories c2";
			$sql .= " On c1.parent_id = c2.cat_id";
			$sql .= " Limit $number, $offset";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		}
		
		public function del_cat($cid)
		{
			$childcat = $this->list_child($cid);
			foreach($childcat as $c)
			{
				$this->db->delete('categories',array('cat_id' => $c['cat_id']));
			}
			$this->db->delete('categories',array('cat_id' => $cid));
		}
		
		public function list_child($pid)
		{
			$query = $this->db->get_where("categories",array('parent_id' => $pid));
			return $query->result_array();
		}
	}
?>