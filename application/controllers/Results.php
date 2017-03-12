<?php


class Results extends BaseController
{
	


	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->tpl('results_tpl');
	}
}