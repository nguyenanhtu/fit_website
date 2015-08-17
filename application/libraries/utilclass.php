<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilclass {

	public $CI = null;
	
	public function __construct()
	{
		$CI = & get_instance();
		$CI->load->Model('User_model');
	}
	
	public function check_admin()
	{
		$CI = & get_instance();
		$user_name = $CI->session->userdata('user_name');
		$level = $CI->session->userdata('user_level');
		if(!empty($username) || !empty($level))
		{
			if($level == "Admin")
			{
				return true;
			}
			return false;
		}
		
		return false;
	}
	
	public function check_user()
	{
		$CI = & get_instance();
		if($CI->session->userdata('user_id')==FALSE)
		{
			return false;
		}
		
		return true;
	}
	
	public function user_online()
	{
		$CI = & get_instance();
		$tg = time();
		//Khoảng thời gian check_time này chính là 
		//khoảng thời gian hệ thống chờ xem user có quay lại trang web
		//để cập nhật database hay ko, nếu hết khoảng thời gian này user 
		//ko trở lại coi như sẽ bị xóa khỏi database.
		$check_time = time() - 900;
		$sess_id = $CI->session->userdata('session_id');
		//$regis = $CI->check_user();
		if($CI->session->userdata('user_id')==FALSE)
		{
			$regis = false;
		}
		else
		{
		$regis = true;
		}
		$temp = $CI->User_model->check_user_online($sess_id);
		if($temp['affrow'] ==1)
		{
			$CI->User_model->update_user_online($sess_id,$tg,$regis);
		}
		else
		{
			$CI->User_model->insert_user_online($sess_id,$tg,$regis);
		}
		
		$total = $CI->User_model->count_user_online();
		$user_regis = $CI->User_model->count_registered();
		$guest = $total - $user_regis;
		$dat = array(
			'total' => $total,
			'user' => $user_regis,
			'guest' => $guest
		);
		
		//Mỗi khi check user mới xem trang web, hệ thống đồng thời
		//xóa bớt tất cả những user đã quá hạn ko quay lại hệ thống, 
		//bất kể người đó có kích hoạt module này hay ko
		$CI->User_model->del_user_online($check_time);
		
		return $dat;
		
	}
}
