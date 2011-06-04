<?php defined('SYSPATH') or die('No direct script access.');

/*
* Verb: Base class for all TwiML verbs used in creating Responses
* Throws a TwilioException if an non-supported attribute or
* attribute value is added to the verb. All methods in Verb are protected
* or private
*/

class Twilio_Verb
{

	private $tag;
	private $body;
	private $attr;
	private $children;

	/*
	 * __construct
	 *   $body : Verb contents
	 *   $body : Verb attributes
	 */
	function __construct($body=NULL, $attr = array())
	{

		if (is_array($body)) {
			$attr = $body;
			$body = NULL;
		}

		$this->tag = $this->clean_class($this);
		$this->body = $body;
		$this->attr = array();
		$this->children = array();
		self::addAttributes($attr);
	}
	
	function clean_class( $class ){
		return str_replace( 'Twilio_Verb_' , '' , get_class($class) );
	}
	/*
	 * addAttributes
	 *     $attr  : A key/value array of attributes to be added
	 *     $valid : A key/value array containging the accepted attributes
	 *     for this verb
	 *     Throws an exception if an invlaid attribute is found
	 */
	private function addAttributes($attr)
	{
		foreach ($attr as $key => $value) {
			if (in_array($key, $this->valid))
				$this->attr[$key] = $value;
			else
				throw new Twilio_Exception($key . ', ' . $value . " is not a supported attribute pair");
		}
	}

	/*
   * append
   *     Nests other verbs inside self.
   */
	function append($verb)
	{
		if (is_null($this->nesting)) {
			throw new Twilio_Exception($this->tag ." doesn't support nesting");
		}else if (!is_object($verb)) {
			throw new Twilio_Exception($verb->tag . " is not an object");
		}else if (!in_array($verb->tag, $this->nesting)) {
			throw new Twilio_Exception($verb->tag . " is not an allowed verb here");
		}else {
			$this->children[] = $verb;
			return $verb;
		}
	}

	/*
   * set
   *     $attr  : An attribute to be added
   *    $valid : The attrbute value for this verb
   *     No error checking here
   */
	function set($key, $value)
	{
		$this->attr[$key] = $value;
	}

	/* Convenience Methods */
	function addSay($body=NULL, $attr = array())
	{
		return self::append(new Twilio_Verb_Say($body, $attr));
	}

	function addPlay($body=NULL, $attr = array())
	{
		return self::append(new Twilio_Verb_Play($body, $attr));
	}

	function addDial($body=NULL, $attr = array())
	{
		return self::append(new Twilio_Verb_Dial($body, $attr));
	}

	function addNumber($body=NULL, $attr = array())
	{
		return self::append(new Twilio_Verb_Number($body, $attr));
	}

	function addGather($attr = array())
	{
		return self::append(new Twilio_Verb_Gather($attr));
	}

	function addRecord($attr = array())
	{
		return self::append(new Twilio_Verb_Record(NULL, $attr));
	}

	function addHangup()
	{
		return self::append(new Twilio_Verb_Hangup());
	}

	function addRedirect($body=NULL, $attr = array())
	{
		return self::append(new Twilio_Verb_Redirect($body, $attr));
	}

	function addPause($attr = array())
	{
		return self::append(new Twilio_Verb_Pause($attr));
	}

	function addConference($body=NULL, $attr = array())
	{
		return self::append(new Twilio_Verb_Conference($body, $attr));
	}

	function addSms($body=NULL, $attr = array())
	{
		return self::append(new Twilio_Verb_Sms($body, $attr));
	}

	/*
   * write
   * Output the XML for this verb and all it's children
   *    $parent: This verb's parent verb
   *    $writeself : If FALSE, Verb will not output itself,
   *    only its children
   */
	protected function write($parent, $writeself=TRUE)
	{
		if ($writeself) {
			$elem = $parent->addChild($this->tag, $this->body);
			foreach ($this->attr as $key => $value)
				$elem->addAttribute($key, $value);
			foreach ($this->children as $child)
				$child->write($elem);
		} else {
			foreach ($this->children as $child)
				$child->write($parent);
		}

	}

}