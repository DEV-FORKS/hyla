<?php defined('SYSPATH') or die('No direct script access.');

class View_Model_Ticket extends View_Model {

	public function title()
	{
		return $this->_model->get('title');
	}

	public function description()
	{
		return $this->_model->get('description');
	}

	public function author()
	{
		return View_Model::factory($this->_model->get_author());
	}
}