<?php

namespace FadhilRiyanto
{
        require_once(__DIR__ . "/Connection/tcp.php");
        require_once(__DIR__ . "/Wrapper/set.php");
        
        class Rocksclient 
        {
                private \FadhilRiyanto\Rocksclient\Connection\TCP $tcp_cur;
                public function __construct(string $host, int $port)
                {
                        /* start tcp */
                        $this->run_init_tcp($host, $port);

                }

                public function run_init_tcp(string $host, int $port)
                {
                        $tcp_ctx = new \FadhilRiyanto\Rocksclient\Connection\TCP();
                        $tcp_ctx->initialize()->set_host("127.0.0.1")->set_port(4000)->create_ctx();
                        $this->tcp_cur = $tcp_ctx;
                }

                public function set($key, $value) 
                {
                        $set = new \FadhilRiyanto\Rocksclient\Wrapper\op_set();
                        // var_dump();
                        $this->tcp_cur->write($set->set_operand1("abc")->set_operand2("value")->getquery());
                }

                public function __destruct()
                {
                        $this->tcp_cur->destroy_ctx();
                }
        }
}