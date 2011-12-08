<?php

/** 
 * ZabbixAPI_Exception
 * 
 * Our own Exception for zabbix related errors
 * 
 * @author Daniel Werner <daniel@tribily.com>
 */
class ZabbixAPI_Exception extends Exception {
	
	/**
	 * @var string Additional Comment for the Exception
	 */
	private $data;
	
	/**
	 * @return string Returns the additional comment
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * 
	 * @param string message The exeception message 
	 * @param string data[optional] additional data (i.E. the message for the frontend user)
	 * @param int code[optional] the internal zabbix error code
	 */
	public function __construct($message, $data = "", $code = 0) {
		parent::__construct ($message, $code);
		$this->data = $data;
	}
}

?>