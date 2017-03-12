<?php


class Defaults extends BaseController
{
	


	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->tpl('defaults_tpl');
	}


	public function user_login()
	{
		$phone = $this->input->post('phone');
		$data['phone'] = $phone;
		$this->userlib->guest_user_login($data);

		$msg = array(
			'code'=>0,
			'msg'=>'ok'
			);
		echo json_encode($msg);
	}
}