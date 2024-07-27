<?php

require_once("../src/Wrapper/set.php");

$set = new \FadhilRiyanto\Rocksclient\Wrapper\op_set();
var_dump($set->set_operand1("abc")->set_operand2("value")->getquery());