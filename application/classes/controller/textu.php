<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Textu extends Controller_TextuTemplate 
{
	/* Here is the basic homepage function */
	public function action_index()
	{
		$this->template->current_page =		'home';
		$this->template->title = 			'Send a Free Text Message From the Internet | Textu.org';
		$this->template->seo_tagline = 		'Send a Text Message Via the Internet';
		$this->template->meta_keywords = 	'text from internet, send text, sms via internet, text messaging, free text';
		$this->template->meta_description = 'Send a free text message from the internet. Our simple web app lets you send an SMS via the web in seconds.';
		$this->template->content =			View::factory('page/home');
	}	
}
