<?php


class Trade extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Trade_mdl','trade');
		$this->load->model('Activity_mdl','activity');
	}


	public function index()
	{

		$userinfo = $this->userinfo;
		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $order_no = isset($_GET['order_no']) ? $_GET['order_no'] : '';
        $realname = isset($_GET['realname']) ? $_GET['realname'] : '';
        $phone = isset($_GET['phone']) ? $_GET['phone'] : '';
        $data['order_no'] = $order_no;
        $data['realname'] = $realname;
        $data['phone'] = $phone;

        $limit = 20;
        $offset = ($page - 1) * $limit;

        $like = array();
        $pagination = '';
        if(!empty($order_no)){
        	$where['where']['order_no'] = $order_no;
        	$countwhere['order_no'] = $order_no;

        }

        if(!empty($realname)){
        	$where['like'] = array('key'=>'realname','value'=>$realname);
        	$like = array('key'=>'realname','value'=>$realname);;
        }

        if(!empty($phone)){
        	$where['where']['phone'] = $phone;
        	$countwhere['phone'] = $phone;

        }
        $countwhere['isdel'] = '0';
        $count = $this->trade->get_count($countwhere,$like);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/admin/trade/index?ordr_no='.$order_no.'&realname='.$realname.'&phone='.$phone);
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where']['isdel'] = '0';

        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->trade->getList($where);	
		$data['list'] = $list;

		$this->tpl('admin/trade_tpl',$data);
	}

	//添加订单
	public function add()
	{
		if(!empty($_POST)){
			$act_id = $this->input->post('act_id');
			$add['order_no'] = $this->input->post('order_no');
			$add['realname'] = $this->input->post('realname');
			$add['price'] = $this->input->post('price');
			$add['phone'] = $this->input->post('phone');
			
			$_act_id = explode(':', $act_id);
			$add['act_id'] = $_act_id[0];
			$add['pro_name'] = $_act_id[1];
			$add['addtime'] = time();
			if($this->trade->add($add)){
				redirect('/admin/trade/index');
			}
		}else{

			$data['activity'] = $this->get_activity();
			
			$this->tpl('admin/trade_add_tpl',$data);
		}

	}

	private function get_activity()
	{
		$activity = array();
		$activity = $this->activity->getList();

		return $activity;
	}




}