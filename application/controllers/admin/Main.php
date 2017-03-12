<?php


class Main extends Zrjoboa
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_mdl','customer');
		$this->load->model('Visit_log_mdl','visit_log');
		$this->load->model('Bussiness_exhibition_mdl','bussiness_exhibition');
		$this->load->model('Bussiness_ad_mdl','bussiness_ad');

	}


	public function index()
	{
		$userinfo = array();
		$userinfo = $this->userinfo;
		$where = array();
		$where_ex = array();
		$where_ad = array();
		if(!empty($userinfo['company_id'])){
			$where['where']['company_id'] = $userinfo['company_id'];
			$where_ex['where']['uid'] = $userinfo['id'];
			$where_ad['where']['uid'] = $userinfo['id'];
			//$visit_where['where'] = array('company_id'=>$userinfo['company_id']);
		}
		//客户情况
		$customer = array();
		$customer = $this->customer->getList($where);
		
		$_tmp = array();
		if(!empty($customer)){
			foreach($customer as $k => $v){
				isset($_tmp[$v['c_type']]) ? $_tmp[$v['c_type']]++ : $_tmp[$v['c_type']] = 1;
			}
		}

		//拜访
		$date = strtotime(date("Y-m-d"));	
		$where['where']['n_v_time'] = $date;
		$visit = array();
		$_visit = array();
		$visit = $this->visit_log->getList($where);
		
		if(!empty($visit)){
			foreach($visit as $vk => $vv){

			}
		}

		//会展收入
		$bussiness_exhibition = array();
		$bussiness_exhibition = $this->bussiness_exhibition->getList($where_ex);
		//客户数量
		$c['count'] = count($bussiness_exhibition);
		//应收金额
		$c['y_amount'] = 0;
		//实收金额
		$c['s_amount'] = 0;
		foreach($bussiness_exhibition as $bek => $bev){
			$c['y_amount'] += $bev['y_amount'];
			$c['s_amount'] += $bev['s_amount'];
		}

		//广告收入
		$bussiness_ad = array();
		$bussiness_ad = $this->bussiness_ad->getList($where_ad);
		//客户数量
		$ad['count'] = count($bussiness_ad);
		//应收金额
		$ad['y_amount'] = 0;
		//实收金额
		$ad['s_amount'] = 0;
		foreach($bussiness_ad as $adk => $adv){
			$ad['y_amount'] += $adv['y_amount'];
			$ad['s_amount'] += $adv['s_amount'];
		}

		


	}
}