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
        $pagination = '';
                
        $countwhere['isdel'] = 0;
        if(!empty($order_no)){
        	$countwhere['order_no'] = $order_no;
        	$where['where']['order_no'] = $order_no;

        }

        if(!empty($realname)){
        	$countwhere['realname'] = $realname;
        	$where['where']['realname'] = $realname;

        }

        if(!empty($phone)){
        	$countwhere['phone'] = $phone;
        	$where['where']['phone'] = $phone;


        }

        $count = $this->trade->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/trade/index?');
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

	public function add_batch()
	{
		if(!empty($_POST)){

			$act_id = $this->input->post('act_id');
			$num = 0;
			if(!empty($_FILES['userfile']['name'])){

					$this->load->library('My_excel');

	                $config['upload_path'] = FCPATH.'/uploads/execl/';
	                
	                $config['allowed_types'] = '*';
	                $config['file_name']  =date("YmdHis");

	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('userfile')){

	                    $error = array('error' => $this->upload->display_errors());
	                    echo json_encode($error);

	                }else{

	                    $data = array('upload_data' => $this->upload->data());
	                    $picname = $data['upload_data']['orig_name'];
	                    $dir = $config['upload_path'].$picname;
	                    $arr = array();
						$arr = $this->my_excel->read_csv($dir);
						if(count($arr) > 0){
							foreach($arr as $k => $v){
								$add['order_no'] = (string)$v['order_no'];
								$add['phone'] = (string)$v['phone'];
								$add['realname'] = (string)$v['realname'];
								$add['pro_name'] = (string)$v['pro_name'];
								$add['act_id'] = $act_id;
								$add['price'] = (string)$v['price'];
								$add['addtime'] = time();
								if($this->trade->add($add)){
									$num++;
								}
							}
						}

					echo '共导入:'.$num.' 条数据';
	                }

	        }else{
	           	exit('no file');
	        }
		}else{

			$data['activity'] = $this->get_activity();
			
			$this->tpl('admin/trade_add_batch_tpl',$data);

		}
	}

	public function edit()
	{
		if(!empty($_POST)){
			$act_id = $this->input->post('act_id');
			$id = $this->input->post('id');
			$add['order_no'] = $this->input->post('order_no');
			$add['realname'] = $this->input->post('realname');
			$add['price'] = $this->input->post('price');
			$add['phone'] = $this->input->post('phone');
			
			$_act_id = explode(':', $act_id);
			$add['act_id'] = $_act_id[0];
			$add['pro_name'] = $_act_id[1];
			$add['addtime'] = time();
			$update_config = array('id'=>$id);

			if($this->trade->update($update_config,$add)){

				redirect('/admin/trade/index');
			}
		}else{

			$id = $this->input->get('id');
			$where['where'] = array('id'=>$id);
			$data['info'] = $this->trade->get_one_by_where($where);

			$data['activity'] = $this->get_activity();
			
			$this->tpl('admin/trade_edit_tpl',$data);
		}

	}

	public function del()
	{
		$id = $this->input->get('id');
		$config = array('id'=>$id);
		if($this->trade->del($config)){
			redirect('/admin/trade/index');
		}
	}

	public function delall()
	{
		$id = $this->input->post('id');
		$where = array('key'=>'id','value'=>$id);
		$this->trade->del(array(),$where);
		redirect('/admin/trade/index');
	}

	private function get_activity()
	{
		$activity = array();
		$activity = $this->activity->getList();

		return $activity;
	}




}