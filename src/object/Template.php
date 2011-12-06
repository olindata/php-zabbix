<?php
/**
 * ZabbixAPI Object Template
 * 
 * This is the Template for our Zabbix Object class Templates
 * 
 * @author Daniel Werner <daniel@tribily.com>
 *
 */
class ZabbixAPI_Object_Template {
	/**
	 * @var ZabbixAPI reference to our ZabbixAPI Object
	 */
	private $api;
	/**
	 * @var string The object Name of our currently name
	 */
	private $objName;
	
	/**
	 * @param string $objName
	 * @param ZabbixAPI $api
	 */
	private function __construct(string $objName, ZabbixAPI $api) {
		$this->objName = $objName;
		$this->api = $api;
	}
	
	/**
	 * @param string $method The Method, that should be called
	 * @param array $params The Parameters, we want to call
	 */
	private function callAPI(string $method, array $params) {
		$this->api->callAPI ( $this->objName, $method, $params );
	}
}