<?php defined('SYSPATH') or die('No direct script access.');

class Twilio_Verb_Gather extends Twilio_Verb {

	protected $valid = array('action', 'method', 'timeout', 'finishOnKey',
		'numDigits');

	protected $nesting = array('Say', 'Play', 'Pause');

	function __construct($attr = array())
	{
		parent::__construct(NULL, $attr);
	}

}