<?php


class Results extends BaseController
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lottery_mdl','lottery');
	}

	public function index()
	{
		$list = array();
		$where['where'] = array('winning'=>'1');
		$list = $this->lottery->getList($where);
		$data['list'] = $list;

		$this->tpl('results_tpl',$data);
	}
}