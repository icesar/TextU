<?php defined('SYSPATH') or die('No direct script access.');

/*
* TwilioRestResponse holds all the REST response data
* Before using the reponse, check IsError to see if an exception
* occurred with the data sent to Twilio
* ResponseXml will contain a SimpleXml object with the response xml
* ResponseText contains the raw string response
* Url and QueryString are from the request
* HttpStatus is the response code of the request
*/

class Twilio_Rest_Response
{

	public $ResponseText;
	public $ResponseXml;
	public $HttpStatus;
	public $Url;
	public $QueryString;
	public $IsError;
	public $ErrorMessage;

	public function __construct($url, $text, $status)
	{
		preg_match('/([^?]+)\??(.*)/', $url, $matches);
		$this->Url = $matches[1];
		$this->QueryString = $matches[2];
		$this->ResponseText = $text;
		$this->HttpStatus = $status;
		if ($this->HttpStatus != 204)
			$this->ResponseXml = @simplexml_load_string($text);

		if ($this->IsError = ($status >= 400)){
			$this->ErrorMessage =	(string) $this->ResponseXml->RestException->Message;
			Kohana::$log->add( Kohana_Log::ERROR, "{$url} error :{$this->ErrorMessage}" );
		}

	}

}

