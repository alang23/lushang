<?php



class Userlib
{


	public static $_ci;

	public function __construct()
	{
		self::$_ci = & get_instance();//php 5.3中self改为static
	}



	//用户登陆
	public function user_login($data=array())
	{

		$cookie_key = self::$_ci->config->item('admin_session');
		self::$_ci->session->set_userdata($cookie_key,json_encode($data));

		return 1;

	}

	//验证用户登陆
	public function check_user_login()
	{

		$cookie_key = self::$_ci->config->item('admin_session');
		$token = self::$_ci->session->userdata($cookie_key);

		$userinfo = array();
		if(!empty($token)){
			$userinfo = json_decode($token,true);
		}
		
		return $userinfo;

	}

	//退出登陆
	public function user_logout()
	{

		$cookie_key = self::$_ci->config->item('admin_session');
		self::$_ci->session->set_userdata($cookie_key,'');
		self::$_ci->session->unset_userdata($cookie_key);

		return 1;
	}

	//前端用户登陆
	public function guest_user_login($data=array())
	{

		$cookie_key = self::$_ci->config->item('guest_session');
		self::$_ci->session->set_userdata('guest_session',json_encode($data));

		return 1;

	}

	public function check_guest_login()
	{

		//$cookie_key = self::$_ci->config->item('guest_session');
		$token = self::$_ci->session->userdata('guest_session');
		$userinfo = array();
		if(!empty($token)){
			$userinfo = json_decode($token,true);
		}
		
		return $userinfo;

	}


}