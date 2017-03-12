<?php


class Setting extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Account_mdl','account');
	}

	public function changepawd()
	{
		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;
		$this->tpl('admin/setting_changepawd_tpl',$data);

	}
	//修改密码
	public function changepwd_ajax()
	{
		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;

		if(!empty($_POST)){
			$pawd = $this->input->post('pawd');
			$newpawd = $this->input->post('newpawd');
			$repawd = $this->input->post('repawd');
			if(!empty($pawd) && !empty($newpawd)){
				if($newpawd != $repawd){
					$msg = array(
						'code'=>'1',
						'msg'=>'两次输入的密码不一致'
						);
					echo json_encode($msg);
					exit;
				}
				$where['where'] = array('id'=>$userinfo['id']);
				$info = $this->account->get_one_by_where($where);
				if($info['pawd'] != md5($pawd)){
					$msg = array(
						'code'=>'2',
						'msg'=>'原密码错误'
						);
					echo json_encode($msg);
					exit;
				}
				$update_config = array('id'=>$userinfo['id']);
				$update_data['pawd'] = md5($newpawd);
				if($this->account->update($update_config,$update_data)){
					$msg = array(
						'code'=>'0',
						'msg'=>'修改成功'
						);
					echo json_encode($msg);
					exit;

				}	
			}else{
				$msg = array(
					'code'=>'2',
					'msg'=>'原密码和新密码不能为空'
					);
				echo json_encode($msg);
				exit;
			}
		}
	}




}