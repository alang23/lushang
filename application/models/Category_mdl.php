<?php


class Category_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_category';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}