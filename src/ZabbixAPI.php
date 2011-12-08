<?php
require_once "exceptions/ZabbixAPI_Exception.php";

/**
 * ZabbixAPI
 * 
 * Our ZabbixAPI. Will be documentated more detailed later
 * 
 * @author Daniel Werner <daniel@tribily.com>
 *
 */
class ZabbixAPI {
	/**
	 * @var string URL to the API
	 */
	private $apiUrl;
	
	/**
	 * @var string the jsonrpcVersion, which will be supplied to zabbix
	 */
	private static $jsonrpcVer = '2.0';
	
	/**
	 * @var string The authToken (=SessionID). This will be set by the authenticate method
	 */
	private $authToken;
	
	/**
	 * @param string $apiUrl URL to the Zabbix API
	 */
	public function __construct($apiUrl) {
		// We try to autoconfigure the url...
		$apiFile = "api_jsonrpc.php";
		if(substr($apiUrl, strlen($apiFile) * (-1))!=$apiFile)
		{
			$apiUrl .= $apiFile;
		}
		$this->apiUrl = $apiUrl;
	}
	
	/**
	 * @param string $object the called Object
	 * @param string $method the called Method
	 * @param string[] $parameters the parameters we using for our call
	 */
	public function callAPI($object, $method, $parameters) {
		// First of all we build our Array, what is our call
		$package = array('method' => $object.'.'.$method, 'id' => 1, 'jsonrpc' => ZabbixAPI::$jsonrpcVer, 'params' => $parameters);
		
		if(isset($this->authToken))
		{
			// It seems that we have already an auth token. so we may should simply use it (:
			$package['auth'] = $this->authToken;
		}
		
		$request = json_encode($package);
		
		$curl = curl_init($this->apiUrl);
		
		$options = array(
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_FRESH_CONNECT => true,
					CURLOPT_HTTPHEADER => array("Content-Type: application/json-rpc"),
					CURLOPT_CUSTOMREQUEST =>  "POST",
					CURLOPT_POSTFIELDS => $request
				);
		

		curl_setopt_array($curl, $options);
		$return = curl_exec($curl);
		curl_close($curl);
		
		$array = json_decode($return, true);
		if($array===NULL)
			throw new ZabbixAPI_Exception("invalid response from zabbix", $return, 0);
		
		if(isset($array['error']))
		{
			$e = $array['error'];
			// There was an error!
			throw new ZabbixAPI_Exception($e['message'], $e['data'], $e['code']);
		}
			
		return $array;
	}
	
	/**
	 * The authenticate Method
	 * 
	 * To use Zabbix the User hast to authenticate against the API. this can be done with this method. 
	 * If the method was succesful, the internal attribute authToken will be set
	 * 
	 * @param string username
	 * @param string password
	 * @param &string[optional] reference to a string, where the error should be placed. (If there is one)
	 * @return boolean returns if the method was succesful
	 */
	public function authenticate($user, $pwd, &$errorString = null)
	{
		// Authenticate ourself at the Zabbix System (This is the only method, that can be called without the auth token)
		try {
			$apiResult = $this->callAPI("user", "authenticate", array("user" => $user, "password" => $pwd));
		} catch(ZabbixAPI_Exception $e) {
			// We experied an error !
			$errorString = $e->getData();
			return false;
		}
		
		// our auth was succesful. we should set the auth token
		$this->authToken = $apiResult['result'];
		return true;
	}

}