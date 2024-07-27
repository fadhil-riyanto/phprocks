<?php

require_once("../src/Connection/tcp.php");

$tcp_ctx = new FadhilRiyanto\Rocksclient\Connection\TCP();
$tcp_ctx->initialize()->set_host("127.0.0.1")->set_port(4000)->create_ctx();

$tcp_ctx->write("test write");

$tcp_ctx->destroy_ctx();