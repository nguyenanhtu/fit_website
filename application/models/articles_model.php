<?php
	class Articles_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		public function show_all()
		{
			$q = "Select article_id, title, articles.status, cat_name, name, post_on, count_view";
			$q .= " From categories";
			$q .= " Inner Join articles ON categories.cat_id = articles.cat_id";
			$q .= " Inner Join users ON articles.user_id = users.user_id";
			$q .= " Order by post_on DESC";
			$query = $this->db->query($q);
			$result = $query->result_array();
			return $result;
		}
		
		public function prepare_dat()
		{
			//$query = $this->db->get("categories");
			$q = "Select * from categories Where cat_id NOT IN(Select parent_id from categories) AND parent_id <> 1";
			$query = $this->db->query($q);
			$result = $query->result_array();
			return $result;
		}
		
		
		public function insert($fn,$fn2)
		{
			$data = array(
				'cat_id' => $this->input->post('catid'),
				'user_id' => 1, //Sau này khi làm chức năng đăng nhập
				//sẽ thay vào là sử dụng thông số của session
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content'),
				'thumbnail' => $fn,
				'status' => $this->input->post('status')
			);
			
			$st = $this->input->post('status');
			
			$this->db->insert('articles',$data);
			//Để giải quyết vấn đề khi ta insert một bài viết mới
			//vào database thì ta phải lập tức có ngay id của bài viết
			//đó để insert vào bảng tài nguyên
			$aid = $this->db->insert_id();
			$this->insert_attach($fn2,$aid,$st,1);
		}
		
		public function insert_attach($fn2,$aid,$st,$uid)
		{
			foreach($fn2 as $dat)
			{
				$data = array(
					'article_id' => $aid,
					'user_id' => 1,//Sau này sẽ thay giá trị này bằng session
					//khi thực hiện đăng nhập
					'name' => $dat['file_name'],
					'type' => $dat['file_type'],
					'status' => $st
				);
				$this->db->insert('resources',$data);
			}
		}
		
		public function show_articles($aid)
		{
			/*$query = $this->db->get_where('articles', array('article_id' => $aid));
			$result = $query->row_array();
			return $result;*/
			
			$q = "Select article_id, a.cat_id, a.title, a.description, a.content, a.post_on, a.thumbnail, c.cat_name";
			$q .= " From categories AS c";
			$q .= " Inner Join articles AS a";
			$q .= " On c.cat_id = a.cat_id";
			$q .= " Where article_id = ?";
			$query = $this->db->query($q,array($aid));
			return $query->row_array();
		}
		
		public function unpublish_art($aid)
		{
			$data = array(
				'status' => FALSE
			);
			
			$this->db->where('article_id',$aid);
			$this->db->update('articles',$data);
		}
		
		public function publish_art($aid)
		{
			$data = array(
				'status' => TRUE
			);
			
			$this->db->where('article_id',$aid);
			$this->db->update('articles',$data);
		}
		
		public function del_article($aid)
		{
			$this->db->delete('articles',array('article_id' => $aid));
		}
		
		public function show_list($aid)
		{
			$q = "Select article_id, title, thumbnail";
			$q .= " From articles";
			$q .= " Where article_id <> ? AND status = ?";
			$q .= " Order by post_on DESC";
			$q .= " LIMIT 3";
			$query = $this->db->query($q,array($aid,TRUE));
			return $query->result_array();
			
		}
		
		public function show_detail($aid)
		{
			$q = "Select a.article_id, a.cat_id, a.user_id, a.title, content, c.cat_name, u.name,";
			$q .= " a.post_on AS date";
			$q .= " From categories AS c";
			$q .= " INNER JOIN articles AS a";
			$q .= " ON c.cat_id = a.cat_id";
			$q .= " INNER JOIN users AS u";
			$q .= " ON a.user_id = u.user_id";
			$q .= " WHERE a.article_id = ?";
			$query = $this->db->query($q,array($aid));
			return $query->row_array();
		}
		
		
		//Show các tin tức tùy theo danh mục truyền vào
		public function show_news($cat)
		{
			$q = "Select article_id, title, articles.description, post_on";
			$q .= " From articles, categories";
			$q .= " Where articles.cat_id = categories.cat_id";
			$q .= " And categories.cat_name = ?";
			$q .= " And articles.status = 1 ORDER BY post_on DESC";
			$query = $this->db->query($q,array($cat));
			return $query->result_array();
		}
		
		//Show tin tức mới nhất không phân biệt categories
		public function show_news_home()
		{
			$q = "Select article_id, title, articles.cat_id, articles.description, post_on, thumbnail";
			$q .= " From articles";
			$q .= " Where articles.status = 1 ORDER BY post_on DESC LIMIT 1";
			$query = $this->db->query($q);
			return $query->row_array();
		}
		
			public function show_event_home()
		{
			$q = "Select article_id, articles.cat_id, title, articles.description, post_on, thumbnail";
			$q .= " From articles, categories";
			$q .= " Where articles.cat_id = categories.cat_id";
			$q .= " And categories.cat_name = 'Sự kiện'";
			$q .= " And articles.status = 1 ORDER BY post_on DESC LIMIT 1";
			$query = $this->db->query($q);
			return $query->row_array();
		}
		
			public function show_notice_home()
		{
			$q = "Select article_id, articles.cat_id, title, articles.description, post_on, thumbnail";
			$q .= " From articles, categories";
			$q .= " Where articles.cat_id = categories.cat_id";
			$q .= " And categories.cat_name = 'Thông báo'";
			$q .= " And articles.status = 1 ORDER BY post_on DESC LIMIT 1";
			$query = $this->db->query($q);
			return $query->row_array();
		}
		
		//chỉ số đầu là categories mà bài viết đó thuộc, chỉ
		//số sau là để lúc show bài liên quan ta sẽ loại bài đó
		public function show_related_posts($catid,$curraid)
		{
			$q = "Select a.article_id, a.cat_id, a.user_id, a.title, content, c.cat_name, u.name,";
			$q .= " a.post_on AS date";
			$q .= " From categories AS c";
			$q .= " INNER JOIN articles AS a";
			$q .= " ON c.cat_id = a.cat_id";
			$q .= " INNER JOIN users AS u";
			$q .= " ON a.user_id = u.user_id";
			$q .= " WHERE a.cat_id = ? AND a.article_id <> ? AND a.status=TRUE";
			$q .= " LIMIT 3";
			$query = $this->db->query($q,array($catid,$curraid));
			return $query->result_array();
		}
		
		public function update_art($aid,$fn,$fdata)
		{
			$data = array(
				'cat_id' =>$this->input->post("category"),
				'title' => $this->input->post("title"),
				'description' => $this->input->post('description'),
				'content' => $this->input->post("content"),
				'thumbnail' => $fn,
				'status' => $this->input->post('status')
			);
			
			$this->db->where('article_id',$aid);
			$this->db->update('articles',$data);
			$rows = $this->db->affected_rows();
			if(!empty($fdata))
			{
			$this->insert_attach($fdata,$aid);
			}
			
			return $rows;
		}
		
		public function count_model($aid,$count)
		{
			$data = array(
				'count_view' => $count
			);
			
			$this->db->where("article_id",$aid);
			$this->db->update("articles",$data);
		}
		
		public function get_count($aid)
		{
			$query = $this->db->get_where('articles',array('article_id'=>$aid));
			return $query->row_array();
		}
		
		
		public function insert_from_user($fn2,$uid,$level)
		{
			if($level=="Sinh viên")
			{
				$status = FALSE;
			}
			else
			{
				$status = TRUE;
			}
			$data = array(
				'cat_id' => $this->input->post('catid'),
				'user_id' => $uid, //Sau này khi làm chức năng đăng nhập
				//sẽ thay vào là sử dụng thông số của session
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content'),
				'status' => $status
			);
			
			$this->db->insert('articles',$data);
			//Để giải quyết vấn đề khi ta insert một bài viết mới
			//vào database thì ta phải lập tức có ngay id của bài viết
			//đó để insert vào bảng tài nguyên
			$aid = $this->db->insert_id();
			$this->insert_attach($fn2,$aid,$status,$uid);
		}
		
		public function search($keyword)
		{
			$this->db->like('content',$keyword);
			$query = $this->db->get_where('articles',array('status' => TRUE));
			return $query->result_array();
		}
		
		public function show_most_visit_articles()
		{
			$q = " Select * From articles Order By count_view DESC LIMIT 5";
			$query = $this->db->query($q);
			return $query->result_array();
		}
		
		//Phần của Huân
		public function show_dt_daihoc(){
			$ac = "SELECT * FROM articles WHERE cat_id=31 ORDER BY article_id DESC LIMIT 6";
			$query = $this->db->query($ac);
			$result = $query->result_array();
			return $result;
		}
		
		public function show_nc_linhvuc(){
			$ac = "SELECT * FROM articles WHERE cat_id=19 ORDER BY article_id DESC LIMIT 6";
			$query = $this->db->query($ac);
			$result = $query->result_array();
			return $result;
		}
		
		public function show_daotao_detail($aid){
			$ac = "SELECT * FROM articles";
			   $ac = $this->db->get_where('articles', array('article_id' => $aid));
			   $result = $ac->row_array();
			   return $result;
		}
		public function show_tlmonhoc(){
			$ac = "SELECT * FROM articles, categories WHERE categories.cat_name= 'Tài liệu môn học' And articles.status = 1 And articles.cat_id = categories.cat_id ORDER BY article_id DESC LIMIT 6";
			$query = $this->db->query($ac);
			$result = $query->result_array();
			return $result;
		}
		
	}
?>