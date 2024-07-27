# Rocksclient 

this library is wrapper for rockserver key value database (https://github.com/fadhil-riyanto/rockserver), written in PHP

## PRECAUTIONS
rockserver itself is not started as production use. just for hobby project (experimental), use at your own risk

## quickstart
```php
<?php
require_once("../src/Rocksclient.php");

$rockserver = new FadhilRiyanto\Rocksclient("127.0.0.1", 8998);
$rockserver->set("randomkey", "this is value sent by PHPaROCKS!");

print_r($rockserver->get("randomkey"));
```

## license
GPL-3.0

## Maintainer
https://github.com/fadhil-riyanto