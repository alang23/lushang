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
		
		//$winning = isset($_GET['winning']) ? $_GET['winning'] : '';
		//$display = isset($_GET['display']) ? $_GET['display'] : '';
		$lottery = array();

		//中奖
		if(isset($_GET['winning'])){
			$where['where']['winning'] = intval($_GET['winning']);
		}

		//开奖
		if(isset($_GET['display'])){
			$where['where']['display'] = intval($_GET['display']);
		}
		$where['where']['phone'] = $phone;
		$lottery = $this->lottery->getList($where);
		$data['lottery'] = $lottery;

		$this->tpl('lucky_tpl',$data);
	}

	//开奖-系统
	public function lotto()
	{
		$phone = $this->input->get('phone');
		$update_config = array('phone'=>$phone,'display'=>'0');
		$update_data = array('display'=>1,'lottery_type'=>2);
		$this->lottery->update($update_config,$update_data);

		redirect('/lucky/index');

	}

	//个人刮奖
	public function lotto_self()
	{
		$userinfo = $this->userinfo;
		$phone = $userinfo['phone'];
		$id = $this->input->post('id');
		$config = array('id'=>$id,'phone'=>$phone);
		$update_data['display'] = 1;
		$update_data['lottery_type'] = 1;
		if($this->lottery->update($config,$update_data)){
			$msg = array(
				'code'=>'0',
				'msg'=>'刮奖成功'
				);
		}else{
			$msg = array(
				'code'=>'1',
				'msg'=>'系统有误,请联系客服'
				);
		}

		echo json_encode($msg);
	}
}