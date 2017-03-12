<?php


class Account_mdl extends Zroa_Model
{
	
	var $table_name = 'ls_admin';


	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}


	
}