<?php


class Defaults extends BaseController
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lottery_mdl','lottery');
		$this->load->model('Trade_mdl','trade');
				$this->load->library('Authcode','authcode');

	}

	public function index()
	{
		$this->tpl('defaults_tpl');
	}


	public function user_login()
	{
		$phone = $this->input->post('phone');
		$data['phone'] = trim($phone);
		//$phone = '13510278144';
		$where['where'] = array('phone'=>$phone);
		$list = $this->trade->get_one_by_where($where);
		$acode = $this->input->post('acode');
		$_acode = $this->session->userdata('auth_code');
		/*
		if($acode != $_acode){
			$msg = array(
				'code'=>'2',
				'msg'=>'验证码错误',
				'data'=>'1'
				);
			echo json_encode($msg);
			exit;
		}
		*/

		if(empty($list)){

			$msg = array(
				'code'=>'1',
				'msg'=>'抱歉，您还没参加过活动呢',
				'data'=>'1'.$phone
				);
			echo json_encode($msg);
			exit;
		}

		$this->userlib->guest_user_login($data);

		$msg = array(
			'code'=>0,
			'msg'=>'ok',
			'data'=>'2'.$phone
			);
		echo json_encode($msg);
		exit;
	}

	public function getauthcode()
    {
        echo  $this->authcode->show();

    }
}