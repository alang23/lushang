<?php


class Bussiness_exhibition_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_bussiness_exhibition';
	var $table_customer = 'zroa_customer';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	//AR
	public function get_list_by_ar($where = array())
	{

		$sql = "SELECT c.realname,c.c_name,be.* from ".
			$this->table_name.' AS be LEFT JOIN '.
			$this->table_customer.' AS c ON(c.id=be.bussiness_id)'.' '.$where['sql'].' limit '. $where['offset'].' ,'.$where['limit'];
		$query = $this->db->query($sql);
		
		$tmp = array();
		foreach ($query->result_array() as $row)
		{
			$tmp[] = $row;
		}
		
		return $tmp;
	}

	    //联表查询
    public function get_list_by_join($config = array())
    {

		if(!empty($config['where'])){
            $this->db->where($config['where']);
        }


		$info = array();
		$info = $this->db->select('be.*')
					->from($this->table_name.' as be')
					->join($this->table_customer.' as c','c.id=be.bussiness_id','left')
					->get()->result_array();

		return $info;

    }	
}