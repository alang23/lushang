<?php


class Finance extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_mdl','customer');
		$this->load->model('charge_type_mdl','charge_type');
		$this->load->model('booth_mdl','booth');
		$this->load->model('bussiness_exhibition_mdl','bussiness_exhibition');
		$this->load->model('bussiness_ad_mdl','bussiness_ad');
		$this->load->model('customer_mdl','customer');
		$this->load->model('ad_type_mdl','ad_type');
		$this->load->model('ad_file_mdl','ad_file');
		$this->load->model('account_mdl','account');
		$this->load->model('Company_mdl','company');
		$this->load->model('Account_mdl','account');

	}


	public function index()
	{

		$type = $this->input->get('type');
		$bussiness_id = isset($_GET['bussiness_id']) ? $_GET['bussiness_id'] : 0;
		$data['bussiness_id'] = $bussiness_id;
		$type = empty($type) ? 'ex' : $type;

		//展位
		$booth = array();
		$booth = $this->get_booth();
		$data['booth'] = $booth;
		
		//收费类型
		$charge_type = array();
		$charge_type = $this->get_charge_type();
		$data['charge_type'] = $charge_type;

		//企业列表
		$bussiness = array();
		$bussiness = $this->get_customer();
		$data['bussiness'] = $bussiness;

		//广告类型
		$ad_type = array();
		$ad_type = $this->ad_type->getList();
		$data['ad_type'] = $ad_type;


		if($type == 'ex'){

			$this->load->view('oa/bussiness_exhibition_add_tpl',$data);

		}elseif($type == 'ad'){

			$this->load->view('oa/bussiness_ad_add_tpl',$data);

		}

	}

	public function ticket()
	{

		
	}

	public function add_ad()
	{
		if(!empty($_POST)){

			$bussiness_time = $this->input->post('bussiness_time');
			$show_time = $this->input->post('show_time');
			$end_time = $this->input->post('end_time');
			$bussiness_id = $this->input->post('bussiness_id');
			$payment = $this->input->post('payment');
			$invoice = $this->input->post('invoice');
			$ad_type = $this->input->post('ad_type');

			$pay_type = $this->input->post('pay_type');
			$y_amount = $this->input->post('y_amount');
			$s_amount = $this->input->post('s_amount');
			$pay_project = $this->input->post('pay_project');
			$remarks = $this->input->post('remarks');

			$contacts = $this->input->post('contacts');
			$phone = $this->input->post('phone');

			//客户代表
			$account_info = array();
			$where['where'] = array('id'=>$bussiness_id);
			$account_info = $this->customer->get_one_by_where($where);
			$realname = $account_info['realname'];
			$uid = $account_info['uid'];

			if(!empty($ad_type) && !empty($bussiness_id)){

				$add['show_time'] = strtotime($show_time);
				$add['realname'] = $realname;
				$add['uid'] = $uid;
				$add['bussiness_time'] = strtotime($bussiness_time);
				$add['end_time'] = strtotime($end_time);
				$add['bussiness_id'] = $bussiness_id;
				$add['payment'] = intval($payment);
				$add['invoice'] = intval($invoice);
				$add['pay_type'] = $pay_type;
				$add['y_amount'] = $y_amount;
				$add['s_amount'] = $s_amount;
				$add['pay_project'] = $pay_project;
				$add['contacts']= $contacts;
				$add['phone'] = $phone;
				$add['ad_type'] = $ad_type;
				$add['addtime'] = time();
				$add['remarks'] = $remarks;

				
				if($this->bussiness_ad->add($add)){

					$bid = $this->bussiness_ad->insert_id();

					if(!empty($_FILES['userfile']['name'])){

		                $config['upload_path'] = FCPATH.'/uploads/ad/';
		                
		                $config['allowed_types'] = '*';
		                $config['file_name']  =date("YmdHis");

		                $this->load->library('upload', $config);

		                if ( ! $this->upload->do_upload('userfile')){

		                    $error = array('error' => $this->upload->display_errors());
		                    echo json_encode($error);

		                }else{

		                    $data = array('upload_data' => $this->upload->data());
		                    $picname = $data['upload_data']['orig_name'];
		                    $dataarr['title'] = $picname;
		                    $dataarr['file'] = $picname;
		                    $dataarr['addtime'] = time();
		                    $dataarr['bussiness_id'] = $bussiness_id;
		                    $dataarr['bid'] = $bid;
		                    
		                   if( $this->ad_file->add($dataarr) )
		                   {
		                   		exit('ok');
		                   }else{

		                   		exit('error');

		                   }

		                }

		            }
				}else{
					exit('error');
				}
			}else{
				exit('canshu');
			}

		}else{
			exit('empty');
		}
		
	}

	public function edit()
	{
		if(!empty($_POST)){

			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$contacts = $this->input->post('contacts');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$remark = $this->input->post('remark');
			$id = $this->input->post('id');

			if(!empty($name) && !empty($address) && !empty($contacts) && !empty($phone) && !empty($id)){

				$update_data['name'] = $name;
				$update_data['address'] = $address;
				$update_data['contacts'] = $contacts;
				$update_data['phone'] = $phone;
				$update_data['email'] = $email;
				$update_data['remark'] = $remark;

				$update_config = array('id'=>$id);
				if($this->company->update($update_config,$update_data)){
					exit('ok');
				}else{
					exit('error');
				}
			}else{
				exit('canshu');
			}

		}else{

			$id = $this->input->get('id');

			$where['where'] = array('id'=>$id);
			$info = $this->company->get_one_by_where($where);
			$data['info'] = $info;

			$this->tpl('oa/company_edit_tpl',$data);
		}
	}

	public function del()
	{
		$id = $this->input->get('id');
		$del_config = array('id'=>$id);
		$del_data['isdel'] = 1;
		if($this->company->update($del_config,$del_data)){
			echo 'ok';
		}else{
			echo 'err';
		}
	}

	//业务视图
	public function scene()
	{

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $start_time = isset($_GET['start_time']) ? $_GET['start_time'] : '';
        $end_time = isset($_GET['end_time']) ? $_GET['end_time'] : '';
        $data['start_time'] = $start_time;
        $data['end_time'] = $end_time;

        $uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
        $data['uid'] = $uid;

        $is_member = isset($_GET['is_member']) ? $_GET['is_member'] : '';
        $data['is_member'] = $is_member;

        $c_name = isset($_GET['c_name']) ? $_GET['c_name'] : '';
        $data['c_name'] = $c_name;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->bussiness_exhibition->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/finance/scene?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where']['isdel'] = '0';

        if(!empty($start_time)){
        	$s_time = strtotime($start_time);
        	$where['where']['show_time>='] = $s_time;
        	if(!empty($end_time)){
        		$e_time = strtotime($end_time);
        		$where['where']['show_time <='] = $e_time;
        	}
        }

        //客户代表
        if(!empty($uid)){
        	$where['where']['uid'] = $uid;
        }

        if(!empty($c_name)){
        	$where['like'] = array('key'=>'c_name','value'=>$c_name);
        }

		$list = $this->bussiness_exhibition->getList($where);
		$data['list'] = $list;

		//客户代表
		$account = array();
		$account = $this->get_account();
		$data['account'] = $account;

		$this->tpl('oa/finance_scene_tpl',$data);
	}

		//广告视图
	public function ad()
	{

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $start_time = isset($_GET['start_time']) ? $_GET['start_time'] : '';
        $end_time = isset($_GET['end_time']) ? $_GET['end_time'] : '';
        $data['start_time'] = $start_time;
        $data['end_time'] = $end_time;

        $uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
        $data['uid'] = $uid;

        $is_member = isset($_GET['is_member']) ? $_GET['is_member'] : '';
        $data['is_member'] = $is_member;

        $c_name = isset($_GET['c_name']) ? $_GET['c_name'] : '';
        $data['c_name'] = $c_name;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->bussiness_ad->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/finance/ad?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where']['isdel'] = '0';

        if(!empty($start_time)){
        	$s_time = strtotime($start_time);
        	$where['where']['show_time>='] = $s_time;
        	if(!empty($end_time)){
        		$e_time = strtotime($end_time);
        		$where['where']['show_time <='] = $e_time;
        	}
        }

        //客户代表

        if(!empty($uid)){
        	$where['where']['uid'] = $uid;
        }

        if(!empty($c_name)){
        	$where['like'] = array('key'=>'c_name','value'=>$c_name);
        }

		$list = $this->bussiness_ad->getList($where);
		$data['list'] = $list;

		//客户代表
		$account = array();
		$account = $this->get_account();
		$data['account'] = $account;

		$this->tpl('oa/finance_ad_tpl',$data);
	}

	//业务-现场详情
	public function scene_detail()
	{
		$id = $this->input->get('id');
		$info = array();
		$where['where'] = array('id'=>$id);
		$info = $this->bussiness_exhibition->get_one_by_where($where);
		$data['info'] = $info;

		//公司信息
		$company = array();
		$_config['where'] = array('a.id'=>$info['uid']);
		$company = $this->account->get_one_by_join($_config);
		$data['company'] = $company;
		
		$this->tpl('oa/finance_scene_detail_tpl',$data);
	}


	//业务-现场详情
	public function do_ticket()
	{
		$id = $this->input->get('id');
		$info = array();
		$where['where'] = array('id'=>$id);
		$info = $this->bussiness_exhibition->get_one_by_where($where);
		$data['info'] = $info;


		$this->tpl('oa/finance_scene_ticket_tpl',$data);
	}

	//后出票据
	public function do_piaoju()
	{
		$this->tpl('oa/finance_scene_piaoju_tpl');
	}


	//业务-广告详情
	public function ad_detail()
	{
		$id = $this->input->get('id');
		$info = array();
		$where['where'] = array('id'=>$id);
		$info = $this->bussiness_ad->get_one_by_where($where);
		$data['info'] = $info;


		$this->tpl('oa/finance_ad_detail_tpl',$data);
	}



	//财务审核-现场
	public function examine_ex()
	{
		$userinfo = $this->userinfo;

		$id = $this->input->post('id');
		$y_amount = $this->input->post('y_amount');
		$s_amount = $this->input->post('s_amount');
		$c_food = $this->input->post('c_food');
		$e_food = $this->input->post('e_food');
		$pay_type = $this->input->post('pay_type');
		$invoice = $this->input->post('invoice');
		$payment = $this->input->post('payment');
		$is_member = $this->input->post('is_member');
		//print_r($_POST);
		//exit;
		if(!empty($id) && !empty($pay_type)){

			$update_config = array('id'=>$id);
			$update_data['y_amount'] = $y_amount;
			$update_data['s_amount'] = $s_amount;
			$update_data['c_food'] = $c_food;
			$update_data['e_food'] = $e_food;
			$update_data['pay_type'] = $pay_type;
			$update_data['invoice'] = $invoice;
			$update_data['s_uid'] = $userinfo['id'];
			$update_data['s_name'] = $userinfo['realname'];
			$update_data['s_time'] = time();
			$update_data['payment'] = $payment;
			$update_data['status'] = 0;

			if($this->bussiness_exhibition->update($update_config,$update_data)){
				exit('ok');
			}else{
				exit('no');
			}

		}else{
			exit('canshu');
		}

	}


	private function get_account()
	{
			//客户代表
		$account = array();
		$where['where'] = array('isdel'=>'0');
		$account = $this->account->getList($where);

		return $account;
	}

	//企业
	private function get_customer()
	{
		$bussiness = array();
		$bussiness = $this->customer->getList();

		return $bussiness;
	}

	//收费类型
	private function get_charge_type()
	{
		$charge_type = array();
		$charge_type = $this->charge_type->getList();

		return $charge_type;
	}


	//展位
	private function get_booth()
	{
		$booth = array();
		$booth = $this->booth->getList();

		return $booth;
	}

	//广告类型
	private function get_ad_type()
	{
		$ad_type = array();
		$ad_type = $this->ad_type->getList();

		return $ad_type;
	}




}




