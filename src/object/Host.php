<?php
// @TODO: We should delete senseless update Methods (like update hostid) - will check this in the actual zabbix php api code
class ZabbixAPI_Object_Host extends ZabbixAPI_Object_Template {

	private $maintenances;
	private $hostid;
	private $proxy_hostid;
	private $host;
	private $dns;
	private $useip;
	private $ip;
	private $port;
	private $status;
	private $disable_until;
	private $error;
	private $available;
	private $errors_from;
	private $lastaccess;
	private $inbytes;
	private $outbytes;
	private $useipmi;
	private $ipmi_port;
	private $ipmi_authtype;
	private $ipmi_privilege;
	private $ipmi_username;
	private $ipmi_password;
	private $ipmi_disable_until;
	private $ipmi_available;
	private $snmp_disable_until;
	private $snmp_available;
	private $maintenanceid;
	private $maintenance_status;
	private $maintenance_type;
	private $maintenance_from;
	private $ipmi_ip;
	private $ipmi_errors_from;
	private $snmp_errors_from;
	private $ipmi_error;
	private $snmp_error;
	
	public function __construct($id, $api)
	{
		parent::__construct('Host', $api);
	
		// we should fetch our data
		$result = $this->callAPI("get", array("output" => "extend", "hostids" => array($id)));
	
		$host = $result['result'][0];
	
		$classVariables = array_keys(get_class_vars(__CLASS__));
		foreach($host as $var => $val)
		{
			if(in_array($var, $classVariables))
			{
				$this->$var = $val;
			}
		}
	}
	
	
	private function __update($attr, $value)
	{
		$this->callAPI("update", array("hostid" => $this->hostid, $attr => $value));
	}
	
	/**
	 * @return the $maintenances
	 */
	public function getMaintenances() {
		return $this->maintenances;
	}

	/**
	 * @return the $hostid
	 */
	public function getHostid() {
		return $this->hostid;
	}

	/**
	 * @return the $proxy_hostid
	 */
	public function getProxy_hostid() {
		return $this->proxy_hostid;
	}

	/**
	 * @return the $host
	 */
	public function getHost() {
		return $this->host;
	}

	/**
	 * @return the $dns
	 */
	public function getDns() {
		return $this->dns;
	}

	/**
	 * @return the $useip
	 */
	public function getUseip() {
		return $this->useip;
	}

	/**
	 * @return the $ip
	 */
	public function getIp() {
		return $this->ip;
	}

	/**
	 * @return the $port
	 */
	public function getPort() {
		return $this->port;
	}

	/**
	 * @return the $status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return the $disable_until
	 */
	public function getDisable_until() {
		return $this->disable_until;
	}

	/**
	 * @return the $error
	 */
	public function getError() {
		return $this->error;
	}

	/**
	 * @return the $available
	 */
	public function getAvailable() {
		return $this->available;
	}

	/**
	 * @return the $errors_from
	 */
	public function getErrors_from() {
		return $this->errors_from;
	}

	/**
	 * @return the $lastaccess
	 */
	public function getLastaccess() {
		return $this->lastaccess;
	}

	/**
	 * @return the $inbytes
	 */
	public function getInbytes() {
		return $this->inbytes;
	}

	/**
	 * @return the $outbytes
	 */
	public function getOutbytes() {
		return $this->outbytes;
	}

	/**
	 * @return the $useipmi
	 */
	public function getUseipmi() {
		return $this->useipmi;
	}

	/**
	 * @return the $ipmi_port
	 */
	public function getIpmi_port() {
		return $this->ipmi_port;
	}

	/**
	 * @return the $ipmi_authtype
	 */
	public function getIpmi_authtype() {
		return $this->ipmi_authtype;
	}

	/**
	 * @return the $ipmi_privilege
	 */
	public function getIpmi_privilege() {
		return $this->ipmi_privilege;
	}

	/**
	 * @return the $ipmi_username
	 */
	public function getIpmi_username() {
		return $this->ipmi_username;
	}

	/**
	 * @return the $ipmi_password
	 */
	public function getIpmi_password() {
		return $this->ipmi_password;
	}

	/**
	 * @return the $ipmi_disable_until
	 */
	public function getIpmi_disable_until() {
		return $this->ipmi_disable_until;
	}

	/**
	 * @return the $ipmi_available
	 */
	public function getIpmi_available() {
		return $this->ipmi_available;
	}

	/**
	 * @return the $snmp_disable_until
	 */
	public function getSnmp_disable_until() {
		return $this->snmp_disable_until;
	}

	/**
	 * @return the $snmp_available
	 */
	public function getSnmp_available() {
		return $this->snmp_available;
	}

	/**
	 * @return the $maintenanceid
	 */
	public function getMaintenanceid() {
		return $this->maintenanceid;
	}

	/**
	 * @return the $maintenance_status
	 */
	public function getMaintenance_status() {
		return $this->maintenance_status;
	}

	/**
	 * @return the $maintenance_type
	 */
	public function getMaintenance_type() {
		return $this->maintenance_type;
	}

	/**
	 * @return the $maintenance_from
	 */
	public function getMaintenance_from() {
		return $this->maintenance_from;
	}

	/**
	 * @return the $ipmi_ip
	 */
	public function getIpmi_ip() {
		return $this->ipmi_ip;
	}

	/**
	 * @return the $ipmi_errors_from
	 */
	public function getIpmi_errors_from() {
		return $this->ipmi_errors_from;
	}

	/**
	 * @return the $snmp_errors_from
	 */
	public function getSnmp_errors_from() {
		return $this->snmp_errors_from;
	}

	/**
	 * @return the $ipmi_error
	 */
	public function getIpmi_error() {
		return $this->ipmi_error;
	}

	/**
	 * @return the $snmp_error
	 */
	public function getSnmp_error() {
		return $this->snmp_error;
	}

	/**
	 * @param field_type $maintenances
	 */
	public function setMaintenances($maintenances) {
		$this->__update("maintenances", $maintenances);
	}

	/**
	 * @param field_type $hostid
	 */
	public function setHostid($hostid) {
		$this->__update("hostid", $hostid);
	}

	/**
	 * @param field_type $proxy_hostid
	 */
	public function setProxy_hostid($proxy_hostid) {
		$this->__update("proxy_hostid", $proxy_hostid);
	}

	/**
	 * @param field_type $host
	 */
	public function setHost($host) {
		$this->__update("host", $host);
	}

	/**
	 * @param field_type $dns
	 */
	public function setDns($dns) {
		$this->__update("dns", $dns);
	}

	/**
	 * @param field_type $useip
	 */
	public function setUseip($useip) {
		$this->__update("useip", $useip);
	}

	/**
	 * @param field_type $ip
	 */
	public function setIp($ip) {
		$this->__update("ip", $ip);
	}

	/**
	 * @param field_type $port
	 */
	public function setPort($port) {
		$this->__update("port", $port);
	}

	/**
	 * @param field_type $status
	 */
	public function setStatus($status) {
		$this->__update("status", $status);
	}

	/**
	 * @param field_type $disable_until
	 */
	public function setDisable_until($disable_until) {
		$this->__update("disable_until", $disable_until);
	}

	/**
	 * @param field_type $error
	 */
	public function setError($error) {
		$this->__update("error", $error);
	}

	/**
	 * @param field_type $available
	 */
	public function setAvailable($available) {
		$this->__update("available", $available);
	}

	/**
	 * @param field_type $errors_from
	 */
	public function setErrors_from($errors_from) {
		$this->__update("errors_from", $errors_from);
	}

	/**
	 * @param field_type $lastaccess
	 */
	public function setLastaccess($lastaccess) {
		$this->__update("lastaccess", $lastaccess);
	}

	/**
	 * @param field_type $inbytes
	 */
	public function setInbytes($inbytes) {
		$this->__update("inbytes", $inbytes);
	}

	/**
	 * @param field_type $outbytes
	 */
	public function setOutbytes($outbytes) {
		$this->__update("outbytes", $outbytes);
	}

	/**
	 * @param field_type $useipmi
	 */
	public function setUseipmi($useipmi) {
		$this->__update("useipmi", $useipmi);
	}

	/**
	 * @param field_type $ipmi_port
	 */
	public function setIpmi_port($ipmi_port) {
		$this->__update("ipmi_port", $ipmi_port);
	}

	/**
	 * @param field_type $ipmi_authtype
	 */
	public function setIpmi_authtype($ipmi_authtype) {
		$this->__update("ipmi_authtype", $ipmi_authtype);
	}

	/**
	 * @param field_type $ipmi_privilege
	 */
	public function setIpmi_privilege($ipmi_privilege) {
		$this->__update("ipmi_privilege", $ipmi_privilege);
	}

	/**
	 * @param field_type $ipmi_username
	 */
	public function setIpmi_username($ipmi_username) {
		$this->__update("ipmi_username", $ipmi_username);
	}

	/**
	 * @param field_type $ipmi_password
	 */
	public function setIpmi_password($ipmi_password) {
		$this->__update("ipmi_password", $ipmi_password);
	}

	/**
	 * @param field_type $ipmi_disable_until
	 */
	public function setIpmi_disable_until($ipmi_disable_until) {
		$this->__update("ipmi_disable_until", $ipmi_disable_until);
	}

	/**
	 * @param field_type $ipmi_available
	 */
	public function setIpmi_available($ipmi_available) {
		$this->__update("ipmi_available", $ipmi_available);
	}

	/**
	 * @param field_type $snmp_disable_until
	 */
	public function setSnmp_disable_until($snmp_disable_until) {
		$this->__update("snmp_disable_until", $snmp_disable_until);
	}

	/**
	 * @param field_type $snmp_available
	 */
	public function setSnmp_available($snmp_available) {
		$this->__update("snmp_available", $snmp_available);
	}

	/**
	 * @param field_type $maintenanceid
	 */
	public function setMaintenanceid($maintenanceid) {
		$this->__update("maintenanceid", $maintenanceid);
	}

	/**
	 * @param field_type $maintenance_status
	 */
	public function setMaintenance_status($maintenance_status) {
		$this->__update("maintenance_status", $maintenance_status);
	}

	/**
	 * @param field_type $maintenance_type
	 */
	public function setMaintenance_type($maintenance_type) {
		$this->__update("maintenance_type", $maintenance_type);
	}

	/**
	 * @param field_type $maintenance_from
	 */
	public function setMaintenance_from($maintenance_from) {
		$this->__update("maintenance_form", $maintenance_from);
	}

	/**
	 * @param field_type $ipmi_ip
	 */
	public function setIpmi_ip($ipmi_ip) {
		$this->__update("ipmi_ip", $ipmi_ip);
	}

	/**
	 * @param field_type $ipmi_errors_from
	 */
	public function setIpmi_errors_from($ipmi_errors_from) {
		$this->__update("ipmi_errors_from", $ipmi_errors_from);
	}

	/**
	 * @param field_type $snmp_errors_from
	 */
	public function setSnmp_errors_from($snmp_errors_from) {
		$this->__update("snmp_errors_from", $snmp_errors_from);
	}

	/**
	 * @param field_type $ipmi_error
	 */
	public function setIpmi_error($ipmi_error) {
		$this->__update("ipmi_error", $ipmi_error);
	}

	/**
	 * @param field_type $snmp_error
	 */
	public function setSnmp_error($snmp_error) {
		$this->__update("snmp_error", $snmp_error);
	}

	
}

?>