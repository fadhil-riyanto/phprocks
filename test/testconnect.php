<?php
require_once("../src/Rocksclient.php");

$rockserver = new FadhilRiyanto\Rocksclient("127.0.0.1", 8998);
$rockserver->set("randomkey", "this is value sent by PHPaROCKS!");

print_r($rockserver->get("randomkey"));