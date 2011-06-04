<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Twilio extends Controller {
	
	public $auto_respond = TRUE;
	
	public $post = false;
	
	public $get = false;
	
	public function before(){	
		
		$this->response = new Twilio_Response();

		// setup posted variables
		if(!empty($_POST)){
			$this->post = (object) Security::xss_clean($_POST);
			unset($_POST);
		}
		
		if(!empty($_GET)){
			$this->get = (object) Security::xss_clean($_GET);
			unset($_GET);
		}
		
		return parent::before();
	}
	
	// check status of sent sms.
	public function action_sms_status(){
	
		// log sms status		
		if($this->post)
			Kohana::$log->add( Kohana::DEBUG, "SmsStatus for {$this->post->SmsSid}:{$this->post->SmsStatus}" );
		
		$this->auto_respond == false;
	}
	
	public function after()
	{
		if ($this->auto_respond === TRUE)
		{
			$this->request->headers['Content-Type'] = File::mime_by_ext('xml');
			$this->request->response = $this->response->Respond();
		}

		return parent::after();
	}
	
	
}