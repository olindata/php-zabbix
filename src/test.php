<?php
require_once "ZabbixAPI.php";

$api = new ZabbixAPI("http://goofy.tech42.de/tribily-zabbix-frontend/");
$error = "";
$result = $api->authenticate("admin", "gg", $error);

var_dump($result, $error);
