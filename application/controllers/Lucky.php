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
		$data['userinfo'] = $userinfo;
		//echo $phone;
		$lottery = array();
		$where['where'] = array('phone'=>$phone);
		$lottery = $this->lottery->getList($where);
		$data['lottery'] = $lottery;

		$this->tpl('lucky_tpl',$data);
	}

	//开奖
	public function lotto()
	{
		$phone = $this->input->get('phone');
		$update_config = array('phone'=>$phone);
		$update_data = array('display'=>1);
		$this->lottery->update($update_config,$update_data);

		redirect('/lucky/index');

	}
}