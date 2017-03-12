<?php


class Company_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_company';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}