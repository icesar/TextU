<?php defined('SYSPATH') or die('No direct script access.');

class Twilio_Verb_Pause extends Twilio_Verb {

	protected $valid = array('length');

	function __construct($attr = array())
	{
		parent::__construct(NULL, $attr);
	}

}