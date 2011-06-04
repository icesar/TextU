<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Module wrapper of Recaptcha for Kohana
 *
 * @package    Recaptcha
 * @category   Module
 * @author     Jacobus Antonsisen
 * @copyright  (c) 2010 TiMano
 * @license    http://kohanaphp.com/license
 */
 
class Kohana_Recaptcha
{
	protected $_config = array();
	
	public static $instance;
	
	/**
	 * Convenience function
	 *
	 * @param array Configuration
	 *
	 * @return Instance of recapcha
	 */
	public static function instance($config = array())
	{
		if ( ! Recaptcha::$instance )
			Recaptcha::$instance = new Recaptcha($config);
		
		return Recaptcha::$instance;
	}
	
	/**
	 * Instantiate the recaptcha library and load the configuration for the current domain
	 *
	 * @param array Configuration
	 */
	public function __construct($config = array())
	{
		require_once Kohana::find_file('vendors', 'recaptcha/recaptchalib');
		
		if ( empty($config) )
			$config = Kohana::config('recaptcha');
			//$config = Arr::get(Kohana::config('recaptcha'), $_SERVER['SERVER_NAME'], array());
		
		$this->_config = $config;
	}
	
	/**
	 * Get the HTML to display to the client
	 *
	 * @return HTML
	 */
	public function get_html()
	{
		return recaptcha_get_html($this->_config['publickey']);
	}
	
	/**
	 * Check the answer and return the response object
	 *
	 * @param string Challenge string
	 * @param string Response string
	 *
	 * @return Response object from recaptcha server
	 */
	public function check_answer($challenge = NULL, $response = NULL)
	{
		if ( is_null($challenge) )
			$challenge = Arr::get($_POST, 'recaptcha_challenge_field', FALSE);
		if ( is_null($response) )
			$response = Arr::get($_POST, 'recaptcha_response_field', FALSE);
		
		return recaptcha_check_answer($this->_config['privatekey'], Request::$client_ip, $challenge, $response);
	}
}