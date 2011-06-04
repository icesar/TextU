<?php defined('SYSPATH') or die('No direct script access.');

class Twilio
{
	// Singleton static instance
	
	protected static $_instance;
	
/* 	public static  */
	
	public static $AccountSid;
	
	public static $AuthToken;
	
	public static $AppNumber;
	
	public static $ApiUrl;
	
	public static function instance()
	{
		if (self::$_instance === NULL)		{
			Kohana::$log->add( Kohana_Log::INFO, "Instantiating Twilio Class" );
			// Create a new instance
			self::$_instance = new self;
		}
			
		return self::$_instance;
	}
	
	public function __construct(){
						
		$config = Kohana::config('twilio');
		//Kohana_Config::instance()->load('twilio');
		
		//foreach( $config as $option => $val )
		self::$AccountSid = $config->AccountSid;
		self::$AuthToken = $config->AuthToken;
		self::$AppNumber = $config->AppNumber;
		self::$ApiUrl = $config->ApiUrl;
		
		//Kohana::$log->add( Kohana_Log::INFO, "Constructing Twillio Class" );
				
	}
	
	public static function factory()
	{
		return new Twilio();
	}
	
	//private function 
	// --------------------------------------------------------
	// SMS
	// TODO: add multiple sms send it longer than 160 char. toggleable
	
	// Send SMS
	public function send_sms( $options )
	{
		
		$data = array(
			'From' => self::$AppNumber,
			'To' => false,
			'Body' => false,
			'StatusCallback' => false,
			'Limit' => true
		);
		
		$data = Arr::merge( $data, (array) $options );
		
		if( !$data['To'] || !$data['Body'] ){
			Kohana::$log->add( Kohana_Log::ERROR, "Can't leave To or Body blank whens sending an SMS" );
			return;
		}
		
		// if no callback url is given use default TODO: define route/controller/action in config
		if( empty($data['StatusCallback']) ){
			$data['StatusCallback'] = URL::site( Route::get('default')->uri(
				array(
				'controller' => 'twilio',
				'action' => 'sms_status'
			)), true);			
		}
		
		//
		if( (bool) $data['Limit'] and strlen($data['Body']) > 160 )
			$data['Body'] = Text::limit_chars_left($data['Body'], 160 , '...');
		
		Kohana::$log->add( Kohana_Log::DEBUG, "Attempting to send SMS : \"{$data['Body']}\" To: {$data['To']}" );
		
		unset($data['Limit']);
		
		$sent = Twilio_Rest_Client::instance()->request( "SMS/Messages", 'POST', $data );
		
		//Apply DRY here
		if( (bool) $sent->IsError ){
			Kohana::$log->add( Kohana_Log::ERROR, "SMS error :{$sent->ErrorMessage}" );
		}
		
		return $sent;
	}
	
	// Get SMS
	public function get_sms( $smsid = null ){
		
		if( empty($smsid) ){
			Kohana::$log->add( Kohana_Log::ERROR, "No SMS Sid given" );
			return;
		}
		
		return Twilio_Rest_Client::instance()->request( "SMS/Messages/{$smsid}", 'GET' );
		
	}
	
	// --------------------------------------------------------
	// Account
	//
	
	public function get_account(){
		return Twilio_Rest_Client::instance()->request( false, 'GET' );
	}
	
	public function set_account_name( $name ){
		return Twilio_Rest_Client::instance()->request( false, 'POST', array( 'FriendlyName' => $name ) );
	}
	
	public function get_sandbox(){
		return Twilio_Rest_Client::instance()->request( "Sandbox", 'GET' );
	}
	
	
	
}