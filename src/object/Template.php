<?php
/**
 * ZabbixAPI Object Template
 * 
 * This is the Template for our Zabbix Object class Templates
 * 
 * @author Daniel Werner <daniel@tribily.com>
 *
 */
abstract class ZabbixAPI_Object_Template {
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
	protected function __construct($objName, $api) {
		$this->objName = $objName;
		$this->api = $api;
	}
	
	/**
	 * @param string $method The Method, that should be called
	 * @param array $params The Parameters, we want to call
	 */
	 protected function callAPI($method, $params) {
		return $this->api->callAPI ( $this->objName, $method, $params );
	}

}