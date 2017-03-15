<?php


class Defaults extends BaseController
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lottery_mdl','lottery');
	}

	public function index()
	{
		$this->tpl('defaults_tpl');
	}


	public function user_login()
	{
		$phone = $this->input->post('phone');
		$data['phone'] = $phone;

		$where['where'] = array('phone'=>$phone);
		$list = $this->lottery->getList($where);
		if(empty($list)){

			$msg = array(
				'code'=>'1',
				'msg'=>'抱歉，您还没参加过活动呢'
				);
			echo json_encode($msg);
			exit;
		}

		$this->userlib->guest_user_login($data);

		$msg = array(
			'code'=>0,
			'msg'=>'ok'
			);
		echo json_encode($msg);
		exit;
	}
}