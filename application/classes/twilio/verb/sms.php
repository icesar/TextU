<?php defined('SYSPATH') or die('No direct script access.');

class Twilio_Verb_Sms extends Twilio_Verb {
	protected $valid = array('to', 'from', 'action', 'method', 'statusCallback');
}