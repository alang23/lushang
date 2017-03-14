<?php


class Scratch extends BaseController
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lottery_mdl','lottery');
	}

	public function index()
	{
		$id = $this->input->get('id');
		$data['id'] = $id;
		$where['where'] = array('id'=>$id);
		$data['info'] = $this->lottery->get_one_by_where($where);

		$this->tpl('scratch_tpl',$data);
	}
}