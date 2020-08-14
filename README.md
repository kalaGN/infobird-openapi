<!--
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-14 13:38:55
 * @LastEditors: afei
 * @LastEditTime: 2020-08-14 19:12:50
-->
# infobird openapi SDK for PHP

## Run environment
- PHP 5.3+.
- cURL extension.

### index.php
```
set_include_path(get_include_path() . PATH_SEPARATOR .$root_path.DIRECTORY_SEPARATOR .'vendor'.DIRECTORY_SEPARATOR .'infobird'.DIRECTORY_SEPARATOR .'openapi'.DIRECTORY_SEPARATOR .'src'.DIRECTORY_SEPARATOR .'openapi');

include_once 'Client.php';


```
### where to use

~~~
use \Infobird\Openapi\Client;
$c = new Client();
echo $c->auth();exit;
~~~
