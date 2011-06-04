<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sms extends Controller_TextuTemplate 
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
	
	
	/* This page lets you send a text message to any phone, includes a captcha. */
	public function action_send()
	{
		// Set up the template
		$this->template->current_page =		'sms_send';
		$this->template->title = 			'Send a Free Text Message From the Internet | Textu.org';
		$this->template->seo_tagline = 		'SMS App from TextU.org';

		// Set up an array for the sms/test_form page variables
		$send_form_vars = array('message' => '', 'errors' => array());
  		
  		// The last thing we set up before rendering the template is the body
  		$this->template->content = View::factory('sms/send_form', $send_form_vars);
	}
	

	/* This page performs the action of sending the text message. */
	public function action_sent()
	{
		// Set up the template
		$this->template->current_page =		'sms_sent';
		$this->template->title = 			'Send a Free Text Message From the Internet | Textu.org';
		$this->template->seo_tagline = 		'SMS App from TextU.org';

		// Set up an array for the sms/test_form page variables
		$send_form_vars = array('message' => '', 'errors' => array());
		$captcha = new Recaptcha;
				
  		// Check to see if the form was submitted
  		if(isset($_POST['sms_submit']))
  		{	  		
	  		$verify = $captcha->check_answer ($_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
			
			if ( ! $verify->is_valid) 
			{
				// What happens when the CAPTCHA was entered incorrectly
				die ("The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: " . $verify->error . ")");
			} 
			else 
			{
				// Create a validation object from the form submission
				$post = Validation::factory($_POST)
					->rule('sms_phone', 'not_empty')
					->rule('sms_phone', 'numeric')
					->rule('sms_phone', 'exact_length', array(':value', 10))
					->rule('sms_message', 'not_empty');
				
	  			// If there were no errors, send the message.
	  			if ($post->check())
	  			{
	  				// Let's save this as a new contact, if in fact it is.
					$contacts = Model::factory('contacts');
					$contacts->add_number($_POST['sms_phone']);

					// Is this number officially active (ie. not blocked or pending?)
					if ($contacts->is_active($_POST['sms_phone']))
					{
						// Create the message to be sent
						$the_message =  array(
							'To' => '+1'.$_POST['sms_phone'],
							'Body' => $_POST['sms_message'].' : via TextU.org',
							'StatusCallback' => false,
							'Limit' => true
						);
		
						// And send it.
						$my_twilio = new Twilio;
						$my_twilio->send_sms($the_message);
		
						// Finally, display a success message.
						$send_form_vars['message'] = '<div>Success! We just sent your text message.<br/><br />FYI, we are not set up to receive messages back yet, but we\'re working on it :)</div>';
					}
					else
					{
						// Otherwise, it's NOT active, so we don't send anything, and tell the user as much
						$send_form_vars['message'] = "";
						$send_form_vars['errors'] = array('<div>Sorry, that phone number is blocked or inactive.</div>');
					}

					// The last thing we set up before rendering the template is the body
					$this->template->content = View::factory('sms/message_sent', $send_form_vars);
	  			}
	  			else
	  			{
					// Validation failed, collect the errors
			        $send_form_vars['errors'] = $post->errors('errors');
			        
					// Let's display the message form again since there was an error.
					$this->template->content = View::factory('sms/send_form', $send_form_vars);

				}
			}
  		}
	}	
}
