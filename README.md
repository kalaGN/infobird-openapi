<!--
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-14 13:38:55
 * @LastEditors: afei
 * @LastEditTime: 2020-08-18 14:40:43
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
 
$token = $this->_request->token;
$systemId = $this->_request->version_id;
$corpType =  $this->_request->isfz?:0;
if(empty($token)){
    echo 'token not found!';exit;
}
$c = new Client($token,$systemId,$corpType);
$res = $c->auth();
       
$res = json_decode($res,true); 
if($res['code']!=='0'){
	echo $res['msg'];exit;
}
        
~~~

## enjoy it
