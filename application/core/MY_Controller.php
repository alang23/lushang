<?php
/**
*@desc 系统基类
*@author alang
*
**/


class Zrjoboa extends CI_Controller
{
	

	var $userinfo = array();

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
	}


	//判断登录
	public function check_login()
	{
		$token = $this->userlib->check_user_login();
		if(empty($token)){
			redirect('/admin/login');
		}

		$this->userinfo = $token;
	}


	public function tpl($tpl,$data=array())
	{
		$this->load->view($tpl,$data);
	}

	private function get_auth()
	{
		//$token = $this->
	}
}


class BaseController extends CI_Controller
{
	

	var $userinfo = array();

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
	}


	//判断登录
	public function check_login()
	{
		$token = $this->userlib->check_guest_login();
		$this->userinfo = $token;
	}


	public function tpl($tpl,$data=array())
	{
		$this->load->view($tpl,$data);
	}
} 

