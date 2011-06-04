<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Controller_Contacts extends Controller_TextuTemplate 
{

	// Display the form which allows a person to block their number from receiving messages
	public function action_block()
	{
		// Set up the template
		$this->template->current_page =		'contact_block';
		$this->template->title = 			'Block your phone number from Textu.org';
		$this->template->seo_tagline = 		'Send a Text Message via the Web';

		// Set up an array for the contacts/block_form page variables
		$block_form_vars = array('message' => '', 'errors' => array());

  		// Check to see if the form was submitted
  		if(isset($_POST['block_submit']))
  		{
			// Create a validation object from the form submission
			$post = Validation::factory($_POST)
				->rule('block_phone', 'not_empty')
				->rule('block_phone', 'numeric')
				->rule('block_phone', 'exact_length', array(':value', 10));
			
  			// If there were no errors, block the number
  			if($post->check())
  			{
				// Let's block this number from receiving messages.
				$contacts = Model::factory('contacts');
				$contacts->block_number($_POST['block_phone']);

				// Finally, display a success message.
				$block_form_vars['message'] = "All set, " . $_POST['block_phone'] . " has been blocked from receiving messages.";

				// The last thing we set up before rendering the template is the body
				$this->template->content = View::factory('contacts/block_form', $block_form_vars);
  			}
  			else
  			{
				// Validation failed, collect the errors
		        $block_form_vars['errors'] = $post->errors('errors');
		        
				// Let's display the message form again since there was an error.
				$this->template->content = View::factory('contacts/block_form', $block_form_vars);
			}
		}
		else
		{
			// We're viewing this page, but haven't submitted the form yet, just display it.
	  		$this->template->content = View::factory('contacts/block_form', $block_form_vars);
	  	}
	}
}
