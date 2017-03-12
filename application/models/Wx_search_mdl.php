<?php


class Wx_search_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_wx_search';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}