<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Errors extends Controller
{
	public function action_404()
	{
		$this->request->status = 404;
		$this->request->response = View::factory('errors/404');
	}
}