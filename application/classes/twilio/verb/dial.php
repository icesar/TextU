<?php defined('SYSPATH') or die('No direct script access.');

class Twilio_Verb_Dial extends Twilio_Verb {

	protected $valid = array('action', 'method', 'timeout', 'hangupOnStar',
		'timeLimit', 'callerId');

	protected $nesting = array('Number', 'Conference');

}