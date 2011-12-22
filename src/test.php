<?php
require_once "ZabbixAPI.php";

$api = new ZabbixAPI("http://goofy.tech42.de/tribily-zabbix-frontend/");
$error = "";
$result = $api->authenticate("admin", "ggg", $error);

$buxbaum = $api->getHostByHostId(10051);
$goofy = $api->getHostByHostId(10049);

var_dump($result, $error, $buxbaum, $goofy);


