<?php


class Defaults extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;

		$this->tpl('defaults',$data);
	}
}