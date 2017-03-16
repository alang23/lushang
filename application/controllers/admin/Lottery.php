<?php



class Lottery extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lottery_mdl','lottery');
	}


	public function index()
	{

		$id = $this->input->get('id');
		$userinfo = $this->userinfo;
		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $count = $this->lottery->get_count();
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/admin/lottery/index?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;

        //$where['order'] = array('key'=>'rank','value'=>'ASC');
		$list = $this->lottery->getList($where);	
		$data['list'] = $list;

		$this->tpl('admin/lottery_tpl',$data);


	}

	public function del()
	{
		$id = $this->input->get('id');
		$config = array('id'=>$id);
		if($this->lottery->del($config)){
			redirect('/admin/lottery/index');
		}
	}

	public function delall()
	{
		$id = $this->input->post('id');
		$where = array('key'=>'id','value'=>$id);
		$this->lottery->del(array(),$where);
		redirect('/admin/lottery/index');
	}
}