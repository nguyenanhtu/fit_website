<?php 
	class User_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		public function check_user_admin()
		{
        $data = array(
            'user_name' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),
			'user_level' => 'Admin'
        );
        
        $query = $this->db->get_where('users',$data);
        $dat = $query->row_array();
        $rows = $this->db->affected_rows();
        $arrdat = array(
            'dat' => $dat,
            'rows' => $rows
        );
        return $arrdat;
		}
		
		public function show_all_users()
		{
			$query = $this->db->get("users");
			$result = $query->result_array();
			return $result;
		}
		
		public function insert($dat)
		{
			$data = array(
				'user_name' => $dat['A'],
				'name' => $dat['B'],
				'status' => $dat['C'],
				'birthday' => $dat['D'],
				'password' => sha1($dat['E']),
				'email' => $dat['F'],
				'user_level' => $dat['G'],
				'department' => $dat['H']
			);
			$this->db->insert('users',$data);
			$uid = $this->db->insert_id();
			$this->insert_web_link($uid,$dat['I']);
		}
		
		public function insert_web_link_list($uid,$link)
		{
			$data = array(
				'user_id' => $uid,
				'link' => $link
			);
			$this->db->insert("web",$data);
		}
		
		//Check user khi login. ko dùng khi kiểm soát quyền
		//truy cập ở các page khác.
		public function check_user()
		{
        $data = array(
            'user_name' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),
            'status' => 'activated'
        );
        
        $query = $this->db->get_where('users',$data);
        $dat = $query->row_array();
        $rows = $query->num_rows();
        $arrdat = array(
            'dat' => $dat,
            'rows' => $rows
        );
        
        return $arrdat;   
		}
		
		 public function get_info($uid)
		{
        $data = array(
            'user_id' => $uid
        );
        
        $query = $this->db->get_where('users',$data);
        $re = $query->row_array();
        $rows = $this->db->count_all_results();
        $dat = array(
            'result' => $re,
            'affrow' => $rows
        );
        
        return $dat;
		}
		
		public function insert_message($to,$from,$mess)
		{
		$data = array(
			'from_user' => $from,
			'to_user' => $to,
			'message' => $mess
		);
		
		$this->db->insert('messages',$data);
		}
	
		public function get_web_link($uid)
		{
		
		$data = array(
            'user_id' => $uid
        );
        
        $query = $this->db->get_where('web',$data);
        $re = $query->row_array();
        $rows = $this->db->count_all_results();
        $dat = array(
            'result' => $re,
            'affrow' => $rows
        );
			
		}
		
		public function show_list()
		{
		//$this->db->select('user_id,first_name,last_name');
		$query = $this->db->get('users');
		$result = $query->result_array();
		return $result;
		}
		
		public function check_pass()
		{
        $data = array(
            'email' => $this->input->post('email')
        );
        $query = $this->db->get_where('users',$data);
        $dat = $query->row_array();
        $rows = $query->num_rows();
        $arrdat = array(
            'dat' => $dat,
            'rows' => $rows
        );
        return $arrdat;
        
		}
    
		public function up_pass($temp_pass)
		{
        $data = array(
            'password' => sha1($temp_pass)
        );
        $this->db->where('email',$this->input->post('email'));
        $this->db->update('users',$data);
        $rows = $this->db->affected_rows();
        return $rows;
		}
		
		public function show_articles_user($uid)
		{
		$q = "Select a.article_id, a.cat_id, a.title, a.post_on, a.status, c.cat_name";
		$q .= " From categories AS c";
		$q .= " Inner Join articles AS a";
		$q .= " On c.cat_id = a.cat_id";
		$q .= " Inner Join users AS u";
		$q .= " On a.user_id = u.user_id";
		$q .= " Where a.user_id = ?";//query binding safe
		$query = $this->db->query($q,array($uid));
		return $query->result_array();
		}
		
		public function show_detail_article($aid)
		{

			/*$query = $this->db->get_where('articles', array('article_id' => $aid));
			$result = $query->row_array();
			return $result;*/
			//Bắt buộc phải dùng inner join ở cả 2 bảng categories và users nếu
			//ko sẽ lấy ra một loạt dữ liệu không cần thiết vì inner join tương
			//đương với mệnh đề where where c.cat_id = a.cat_id
			$q = "Select article_id, a.cat_id, a.title, a.description, a.content, a.post_on, a.thumbnail, c.cat_name, u.user_id";
			$q .= " From categories AS c";
			$q .= " Inner Join articles AS a";
			$q .= " On c.cat_id = a.cat_id";
			$q .= " Inner Join users AS u";
			$q .= " On a.user_id = u.user_id";
			$q .= " Where article_id = ?";
			$query = $this->db->query($q,array($aid));
			return $query->row_array();
		}
		
		public function update_article($aid,$fdata,$uid)
		{
			$data = array(
				'cat_id' =>$this->input->post("catid"),
				'title' => $this->input->post("title"),
				'description' => $this->input->post('description'),
				'content' => $this->input->post("content"),
			);
			
			$this->db->where('article_id',$aid);
			$this->db->update('articles',$data);
			$rows = $this->db->affected_rows();
			if(!empty($fdata))
			{
			$this->insert_attach_user($fdata,$aid,$uid);
			}
			
			return $rows;
		}
		
		public function insert_attach_user($fn2,$aid,$uid)
		{
			foreach($fn2 as $dat)
			{
				$data = array(
					'article_id' => $aid,
					'user_id' => $uid,//Sau này sẽ thay giá trị này bằng session
					//khi thực hiện đăng nhập
					'name' => $dat['file_name'],
					'type' => $dat['file_type']
				);
				$this->db->insert('resources',$data);
			}
		}
		
		public function show_teachers()
		{
			$q = "Select u.user_id, u.user_name, u.name, u.status, u.birthday, u.email, u.avatar, u.user_level, u.department, w.link";
			$q .= " From users AS u";
			$q .= " Inner Join web AS w";
			$q .= " On u.user_id = w.user_id";
			$q .= " Where u.user_level = 'Giảng viên'";
			$query = $this->db->query($q);
		    $result = $query->result_array();
			$affrow = $query->num_rows();
			$re = array(
				'result' => $result,
				'affrow' => $affrow
			);
			
			return $re;
		}
		
		//Phần của Huân 
		
		public function show(){
			$query = $this->db->get("users");
			$result = $query->result_array();
			return $result;
		}
		public function showac(){
			$ac = "SELECT * FROM users WHERE user_level='Giảng Viên'";
			$query = $this->db->query($ac);
			$result = $query->result_array();
			return $result;
		}
		public function show_acc_detail($uid){
			$ac = "SELECT * FROM users";
			   $ac = $this->db->get_where('users', array('user_id' => $uid));
			   $result = $ac->row_array();
			   return $result;
		}
		
		
		public function add(){ 
		$this->load->helper('date');
		$ngay = $this->input->post("slngay");
		$thang = $this->input->post("slthang");
		$nam = $this->input->post("slnam");
		$birthday = new DateTime("$thang/$ngay/$nam");
		$birthday = date_format($birthday,'Y-m-d H:i:s');

		//$str = $ngay."-".$thang."-".$nam;
		//$bd = date("dd-mm-yyyy",strtotime($str));
			$data=array(
	                    "user_name" => $this->input->post("user_name"),
						"name" => $this->input->post("name"),
	                    "birthday" =>  $birthday,
						"password" => sha1($this->input->post("password")),
						"email" => $this->input->post("email"),
						"user_level" => $this->input->post("user_level"),
						"department" => $this->input->post("department"),
						"status" => $this->input->post("status"),
        );
		
			$this->db->insert("users", $data);
			$uid = $this->db->insert_id();
			$link = $this->input->post("link");
			$this->insert_web_link($uid,$link);
		}
		
		public function insert_web_link($uid, $link){
			$data = array(
				"user_id" => $uid,
				"link" => $link,
			);
			$this->db->insert("web",$data);
		}
		
		public function edit($uid){
			$q = "Select users.user_id, users.user_name, users.name, users.status, users.birthday, users.email, users.user_level, users.department";
			$q .= " From web, users";
			$q .= " Where users.user_id = $uid";
			$query = $this->db->query($q);
			$result = $query->row_array();
			return $result;
			
		}
		
		public function edit_acc($uid){
			$q = "Select * ";
			$q .= " From users WHERE user_id = $uid";
			
			$query = $this->db->query($q);
			$result = $query->row_array();
			return $result;
			
		}
		
		public function update($uid)
		{
			$data=array(
	                    
						"name" => $this->input->post("name"),
						"user_name" => $this->input->post("user_name"),
	                    "password" => sha1($this->input->post("pass")),
						"email" => $this->input->post("email"),
						"status" => $this->input->post("status"),
						"birthday" => $this->input->post("birthday"),
						"user_level" => $this->input->post("user_level"),
						"department" => $this->input->post("department"),
						
						
        );
		$this->db->where('user_id',  $uid);
		 $this->db->update('users', $data); 
		 $row = $this->db->affected_rows();
		 return $row;
		
			
		}
	
		public function delete($did){
		 $this->db->delete('users', array('user_id' => $did)); 
			
		}
		
		public function unpublish_user($uid){
			$data = array(
				'status' => "Banned"
			);
			$this->db->where('user_id',$uid);
			$this->db->update('users',$data);
		}
		public function publish_user($uid){
			$data = array(
				'status' => "Activated"
			);
			$this->db->where('user_id',$uid);
			$this->db->update('users',$data);
		}
		public function update_avatar($uid, $avatar){
			$data = array(
				'avatar' => $avatar,
			);
			$this->db->where('user_id',$uid);
			$this->db->update('users',$data);
		}
    
	}
?>