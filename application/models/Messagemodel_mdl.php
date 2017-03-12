<?php


class Messagemodel_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_messagemodel';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}