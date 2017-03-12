<?php


class Msgtips extends CI_Controller
{
	

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo __FILE__;
	}



	public function check_role()
	{
		$this->load->view('msg/role_err');
	}

	public function success()
	{
		$this->load->view('msg/msg_success');
	}

	public function errors()
	{
		$this->load->view('msg/msg_errors');
	}
}