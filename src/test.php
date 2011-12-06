<?php
$api = new ZabbixAPI("http://goofy.tech42.de/tribily-zabbix-frontend/");
$api->authenticate("admin", "test");
$host = $api->getHost(1);