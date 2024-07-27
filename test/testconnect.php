<?php

require_once("../src/Rocksclient.php");

$rockserver = new FadhilRiyanto\Rocksclient("127.0.0.1", 4000);
$rockserver->set("random", "need");