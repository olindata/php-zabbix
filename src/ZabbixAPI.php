<?php
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
	
	private static $jsonrpcVer = '2.0';
	
	private $authToken;
	
	/**
	 * @param string $apiUrl URL to the API
	 */
	public function __construct($apiUrl) {
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
					CURLOPT_HEADER => array("Content-Type: application/json-rpc"),
					CURLOPT_CUSTOMREQUEST =>  "POST",
					CURLOPT_POSTFIELDS => http_build_query($request)
				);
		
		
		curl_setopt_array($curl, $options);
		$return = curl_exec($curl);
		curl_close($curl);
		
	}
	
	public function authenticate($user, $pwd)
	{
		// Authenticate ourself at the Zabbix System (This is the only 
	}

}