<?php


class Products extends BaseController
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Activity_mdl','activity');
	}

	public function index()
	{
		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;
		
		$data['products'] = $this->activity->getList();

		$this->tpl('products_tpl',$data);
	}
}