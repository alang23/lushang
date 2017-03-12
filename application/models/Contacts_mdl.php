<?php


class Contacts_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_contacts';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

	
}