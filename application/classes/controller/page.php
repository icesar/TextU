<?php defined('SYSPATH') or die('No direct script access.');
  
  class Controller_Page extends Controller_Textu {
  
  	public function action_abbreviations()
  	{
		$this->template->current_page =		'abbreviations';
		$this->template->title = 			'Texting Abbreviations Everyone Should Know | Textu.org';
		$this->template->seo_tagline = 		'Text Message and SMS Abbreviations';
		$this->template->meta_keywords = 	'text abbreviations, text messaging, txt msg, text from internet';
		$this->template->meta_description = 'Send a free text message from the internet. Our simple web app lets you send an SMS via the web in seconds.';
		$this->template->content = 			View::factory('page/abbreviations');
  	}
  	
  	public function action_about()
  	{
		$this->template->current_page =		'about';
		$this->template->title = 			'About TextU.org | Text Messaging from the Web';
		$this->template->seo_tagline = 		'Send a Text Message From the Internet';
		$this->template->meta_keywords = 	'about textu, text from internet, sms via internet, text messaging';
		$this->template->meta_description = 'Send a free text message from the internet. Our simple web app lets you send an SMS via the web in seconds.';
		$this->template->content = 			View::factory('page/about');
  	}
  	
  	
  	public function action_blogs()
  	{
		$this->template->current_page =		'blogs';
		$this->template->title = 			'SMS and Texting Widgets for Blogs | TextU.org';
		$this->template->seo_tagline = 		'SMS and Texting Widgets for Blogs';
		$this->template->meta_keywords = 	'sms blog widgets, post by text message, text from internet, text messaging';
		$this->template->meta_description = 'Send a free text message from the internet. Our simple web app lets you send an SMS via the web in seconds.';
		$this->template->content = 			View::factory('page/blogs');
  	}
  	
  	public function action_freetexting()
  	{
		$this->template->current_page =		'freetexting';
		$this->template->title = 			'The Secret to Free Texting on the Internet | TextU.org';
		$this->template->seo_tagline = 		'How to Send Free Texts Online';
		$this->template->meta_keywords = 	'free texts online, free sms texts, send a free text';
		$this->template->meta_description = 'Learn how to send a free text message from the internet. We break down the essentials to free SMS texts.';
		$this->template->content = 			View::factory('page/freetexting' );
  	}
  	
  	public function action_partners()
  	{
		$this->template->current_page =		'partners';
		$this->template->title = 			'TextU.org Partners | Text from the Internet';
		$this->template->content = 			View::factory('page/partners');
  	}

  	public function action_privacy()
  	{
		$this->template->current_page =		'privacy';
		$this->template->title = 			'TextU.org Privacy Policy | Text from the Internet';
		$this->template->content = 			View::factory('page/privacy');
  	}
  	  	  	  	
  	public function action_textingapps()
  	{
		$this->template->current_page =		'textingapps';
		$this->template->title = 			'Top 5 Texting Apps for iPhone and Android | TextU.org';
		$this->template->seo_tagline = 		'Android &amp; iPhone Apps for Texting and SMS';
		$this->template->meta_keywords = 	'iphone texting app, group chat app, free texts phone, free SMS';
		$this->template->meta_description = 'We break down the best apps for free texting and group texting on the iPhone and Android.';
		$this->template->content = 			View::factory('page/textingapps' );
  	}

  }