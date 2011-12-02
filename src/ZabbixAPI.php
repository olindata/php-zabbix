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
	protected function callAPI($object, $method, $parameters) {
	
	}

}