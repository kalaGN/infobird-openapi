<!--
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-14 13:38:55
 * @LastEditors: afei
 * @LastEditTime: 2020-08-14 19:22:48
-->
# infobird openapi SDK for PHP

## Run environment
- PHP 5.3+.
- cURL extension.

## how to use
###  first step

~~~
require './vendor/autoload.php';
~~~



### second 

~~~
use \Infobird\Openapi\Client;
$c = new Client();
echo $c->auth();exit;
~~~


## attention!!!
### when you use the zend framework 1.12 please write this in index.php
```
set_include_path(get_include_path() . PATH_SEPARATOR .$root_path.DIRECTORY_SEPARATOR .'vendor'.DIRECTORY_SEPARATOR .'infobird'.DIRECTORY_SEPARATOR .'openapi'.DIRECTORY_SEPARATOR .'src'.DIRECTORY_SEPARATOR .'openapi');

include_once 'Client.php';

```