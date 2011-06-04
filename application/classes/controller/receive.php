<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Receive extends Controller {
	
	// Responds to an incoming SMS
	public function action_sms()
	{
		$this->response->headers('Content-Type', 'text/xml');
		$this->response->body(View::factory('responses/sms_basic'));
	}
	
}