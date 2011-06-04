<?php defined('SYSPATH') or die('No direct script access.');

class Twilio_Verb_Record extends Twilio_Verb {

	protected $valid = array('action', 'method', 'timeout', 'finishOnKey',
		'maxLength', 'transcribe', 'transcribeCallback', 'playBeep');

}