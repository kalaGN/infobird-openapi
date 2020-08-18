<!--
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-14 13:38:55
 * @LastEditors: afei
 * @LastEditTime: 2020-08-18 11:42:24
-->

# infobird openapi SDK for PHP

## Run environment

- PHP 5.3+.
- cURL extension.

## how to use

### first install the libraay

~~~ sh
composer require infobird/openapi
~~~
<font color=red  face="黑体">
config.ini should in you rootpath and openapi.url config is need
</font>

index.php file you need to add 
~~~ php
require './vendor/autoload.php';
~~~

### then  

~~~ php
use \Infobird\Openapi\Client;
$c = new Client($token,$systemId,$corpType);
echo $c->auth();
~~~

## enjoy it
