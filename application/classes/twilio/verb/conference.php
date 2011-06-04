<?php defined('SYSPATH') or die('No direct script access.');

class Twilio_Verb_Conference extends Twilio_Verb {

	protected $valid = array('muted', 'beep', 'startConferenceOnEnter',
		'endConferenceOnExit', 'waitUrl', 'waitMethod');

}