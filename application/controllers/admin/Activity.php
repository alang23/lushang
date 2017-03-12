<?php


class Activity extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Activity_mdl','activity');
		$this->load->model('Trade_mdl','trade');
		$this->load->model('Lottery_mdl','lottery');
	}


	public function index()
	{

		$userinfo = $this->userinfo;
		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $count = $this->activity->get_count();
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/admin/activity/index?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;

        $where['order'] = array('key'=>'rank','value'=>'ASC');
		$list = $this->activity->getList($where);	
		$data['list'] = $list;

		$this->tpl('admin/activity_tpl',$data);
	}

	//添加
	public function add()
	{
		if(!empty($_POST)){
			$add['name'] = $this->input->post('name');
			$add['rank'] = $this->input->post('rank');
			$add['passin'] = intval($this->input->post('passin'));
			$add['num'] = $this->input->post('num');
			$add['num_s'] = $this->input->post('num_s');
			$add['price'] = $this->input->post('price');
			$add['rounds'] = $this->input->post('rounds');

			//图片上传
			if(!empty($_FILES['userfile']['name'])){

	             $config['upload_path'] = FCPATH.'/uploads/activity/';               
	             $config['allowed_types'] = '*';
	             $config['file_name']  =date("YmdHis");

	             $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('userfile')){

	                    $error = array('error' => $this->upload->display_errors());
	                    echo json_encode($error);

	                }else{

	                    $data = array('upload_data' => $this->upload->data());
	                    $add['pic'] = $data['upload_data']['orig_name'];
	                    if(!empty($add['name'])){
							if($this->activity->add($add)){
								redirect('/admin/activity');
							}else{
								exit('err');
							}
						}else{
							exit('活动名称不能为空');
						}

	                }

	        }else{
	           exit('请上传图片');
	        }	


		}else{
			$this->tpl('admin/activity_add_tpl');
		}

	}

		//添加
	public function edit()
	{
		if(!empty($_POST)){

			$add['name'] = $this->input->post('name');
			$add['rank'] = $this->input->post('rank');
			$add['passin'] = intval($this->input->post('passin'));
			$add['num'] = $this->input->post('num');
			$add['num_s'] = $this->input->post('num_s');
			$add['price'] = $this->input->post('price');
			$add['rounds'] = $this->input->post('rounds');

			$id = $this->input->post('id');

			if(!empty($_FILES['userfile']['name'])){

	             $config['upload_path'] = FCPATH.'/uploads/activity/';               
	             $config['allowed_types'] = '*';
	             $config['file_name']  =date("YmdHis");

	             $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('userfile')){

	                    $error = array('error' => $this->upload->display_errors());
	                    echo json_encode($error);

	                }else{

	                    $data = array('upload_data' => $this->upload->data());
	                    $add['pic'] = $data['upload_data']['orig_name'];	                    

	                }
	        }

			if(!empty($add['name']) && !empty($id)){
				$update_config = array('id'=>$id);

				if($this->activity->update($update_config,$add)){
					redirect('/admin/activity/index');
				}else{
					exit('err');
				}
				
			}else{
				exit('empty');
			}
		}else{

			$id = $this->input->get('id');
			$config['where'] = array('id'=>$id);
			$info = $this->activity->get_one_by_where($config);
			$data['info'] = $info;

			$this->tpl('admin/activity_edit_tpl',$data);
		}

	}

	public function del()
	{
		$id = $this->input->get('id');

		$config = array('id'=>$id);
		if($this->activity->del($config)){
			redirect('/admin/activity/index');
		}
	}

	//生成奖券
	public function lottery()
	{
		$id = $this->input->get('id');
		$a_where['where'] = array('id'=>$id);

		//活动基本信息
		$activity = array();
		$activity = $this->activity->get_one_by_where($a_where);
		$a_price = $activity['price'];

		$where['where'] = array('act_id'=>$id);
		$orders = array();
		$orders = $this->trade->getList($where);
		$num = 0;
		foreach($orders as $k => $v){
			$price = $v['price'];
			//奖票数量
			$lottery_num = $price/$a_price;
			for($i=0;$i<$lottery_num;$i++){
				$add['order_no'] = $v['order_no'];
				$add['act_id'] = $v['act_id'];
				$add['phone'] = $v['phone'];
				$add['pro_name'] = $v['pro_name'];
				$add['addtime'] = time();
				$add['lottery_no'] = $v['id'].'_'.$i;
				$add['rounds'] = $activity['rounds'];
				if($this->lottery->add($add)){
					$num++;
				}
			}

			$update_config = array('id'=>$v['act_id']);
			$update_data['do_ticket'] = 1;
			$this->activity->update($update_config,$update_data);
			
		}
		echo '成功生成:'.$num.'张奖券';
	}




}