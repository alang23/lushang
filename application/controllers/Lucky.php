<?php


class Lucky extends BaseController
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lottery_mdl','lottery');
	}

	public function index()
	{
		//$phone = '15814073940';
		$userinfo = $this->userinfo;
		$phone = $userinfo['phone'];
		$lottery = array();
		$where['where'] = array('phone'=>$phone);
		$lottery = $this->lottery->getList($where);
		$data['lottery'] = $lottery;

		$this->tpl('lucky_tpl',$data);
	}
}