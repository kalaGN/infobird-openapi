
# infobird openapi SDK for PHP

## Run environment

- PHP 5.3+.
- cURL extension.

## how to use

### first

~~~sh
composer require infobird/openapi
~~~
some file you need to add 
~~~php
require './vendor/autoload.php';
~~~

### second  

~~~php
use \Infobird\Openapi\Client;
$c = new Client();
echo $c->auth();
~~~

## enjoy it
