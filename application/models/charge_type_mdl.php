<?php


class Charge_type_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_charge_type';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}