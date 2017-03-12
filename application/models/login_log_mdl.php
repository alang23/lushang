<?php


class Login_log_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_login_log';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}