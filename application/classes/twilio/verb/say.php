<?php defined('SYSPATH') or die('No direct script access.');

class Twilio_Verb_Say extends Twilio_Verb {

	protected $valid = array('voice', 'language', 'loop');

}