<?php

class Test extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->library('myemail');
		$this->load->library('Categorylib','categorylib');
		$this->load->library('Smsapi','smsapi');
	}


	public function index()
	{
		//$user = $this->userlib->user_login();
		//echo $user;
		//$result = $this->myemail->sendemail();
		//echo $result;

		$mobile = '15814073945';
		$msg = '【汇佳购物】尊敬的用户您好：您已成功订购汇佳购物的商品，我们将在2-3天给您送货上门（春节期间的订单将于2月5号统一发出）如需帮助请致电4001689690，感谢您的支持';
		$result = $this->smsapi->sendSMS( $mobile, $msg);
		var_dump($result);
		exit;
		$result = $this->smsapi->execResult($result);
		if($result[1]==0){
			echo '发送成功';
		}else{
			echo "发送失败{$result[1]}";
		}


	}
}