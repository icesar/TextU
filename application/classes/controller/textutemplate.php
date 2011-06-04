<?php defined('SYSPATH') or die('No direct script access.');

class Controller_TextuTemplate extends Controller_Template 
{
	public $template = 'templates/default';
		
	/**
	* The before() method is called before your controller action.
	* In our template controller we override this method so that we can
	* set up default values. These variables are then available to our
	* controllers if they need to be modified.
	*/
	public function before()
	{
		parent::before();
		
		if ($this->auto_render)
		{
			// Initialize empty values
			$this->template->current_page =		'home';
			$this->template->title = 			'Send Text Messages From the Internet | TextU.org';
			$this->template->seo_tagline = 		'Send a Text Message From the Internet';
			$this->template->meta_keywords = 	'text from internet, send text, sms via internet, text messaging';
			$this->template->meta_description = 'Send a free text from the internet. Our simple web app lets you send an SMS via the web in seconds.';
			$this->template->scripts = array();		
		}
	}
	
	/**
	* The after() method is called after your controller action.
	* In our template controller we override this method so that we can
	* make any last minute modifications to the template before anything
	* is rendered.
	*/
	public function after()
	{
		if ($this->auto_render)
		{
			$scripts = array('http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js');		
			$this->template->scripts = array_merge( $this->template->scripts, $scripts );
		}
		parent::after();
	}
}

