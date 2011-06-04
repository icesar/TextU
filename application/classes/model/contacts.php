<?php defined('SYSPATH') OR die('No Direct Script Access');

// Constant definitions for this class
define('BLOCKED', 0);
define('PENDING', 1);
define('ACTIVE', 2);

Class Model_Contacts extends Model
{
    /*
       CREATE TABLE `contacts` (
       `id` INT PRIMARY KEY AUTO_INCREMENT,
       `number` VARCHAR(30) NOT NULL,
       `status` VARCHAR(30) NOT NULL);
     */
     
	// This function retrieves a contact ID by their phone number
	public function get_by_number($number)
	{
		try
		{
			// Attempt to retrieve the contact ID
			$contact = DB::select()
				->from('contacts')
				->where('number', '=', $number)
				->execute();
				
			// Return the ID belonging to that number, or FALSE
			if ($contact->count() > 0)
				return $contact->get('id');
			else
				return false;
		}
		catch (Exception $e)
		{
			// echo $e->getMessage();
			return false;
		}
	}
	

	// Add a white-listed phone number to the database
	public function add_number($number)
	{
		try
		{
			// Create a new record in the database
			$insert_id = DB::insert('contacts', array('number', 'status'))
	            ->values(array($number, ACTIVE))
	            ->execute();
			return $insert_id;
		}
		catch (Exception $e)
		{
			// echo $e->getMessage();
			return false;
		}
	}
	
	
	// Block a number from receiving text messages
	public function block_number($number)
	{
		try
		{
			// Check to see if a contact with this number exists, and if not, create one.
			if ( ! ($contact_id = $this->get_by_number($number)))
				$this->add_number($number);

			// Now there must be an entry, so update it for this contact
			$update_id = DB::update('contacts')
				->set(array('status' => BLOCKED))
				->where('number', '=', $number)
				->execute();
			return $update_id;
		}
		catch (Exception $e)
		{
			// echo $e->getMessage();
			return false;
		}	
	}
	
	
	// Verify that we are able to send a message to a number
	public function is_active($number)
	{
		// Attempt to retrieve the contact
		$contact = DB::select()->from('contacts')->where('number', '=', $number)->execute();

		// Return a boolean
		return ($contact->get('status') == ACTIVE);
	}
	

	// Check if a number has been blocked.
	public function is_blocked($number)
	{
		// Attempt to retrieve the contact
		$contact = DB::select()->from('contacts')->where('number', '=', $number)->execute();

		// Return a boolean
		return ($contact->get('status') == BLOCKED);
	}
}
