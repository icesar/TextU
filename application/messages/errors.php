<?php defined('SYSPATH') or die('No direct script access.');

return array(

    'sms_phone' => array(
        'not_empty' 	=> 'Please enter a valid 10 digit phone number, no dashes or spaces.',
        'numeric' 		=> 'Please enter only numbers.',
        'exact_length' 	=> 'Please enter exactly 10 digits for the phone number.',
    ),

    'block_phone' => array(
        'not_empty' 	=> 'Please enter a valid 10 digit phone number, no dashes or spaces.',
        'numeric' 		=> 'Please enter only numbers.',
        'exact_length' 	=> 'Please enter exactly 10 digits for the phone number.',
    ),

    'sms_message' => array(
        'not_empty' => 'Your message can\'t be blank, yo.',
    ),
);
