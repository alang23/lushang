<?php


class Visit_log_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_visit_log';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}