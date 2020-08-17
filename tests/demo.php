<?php
/*
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-17 10:25:16
 * @LastEditors: afei
 * @LastEditTime: 2020-08-17 11:20:04
 */
require_once '../src/openapi/Client.php';
require_once '../src/openapi/Core/Util.php';
use \Infobird\Openapi\Client;
$c = new Client();
var_dump($c->auth());