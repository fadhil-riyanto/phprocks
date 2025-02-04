<?php

namespace FadhilRiyanto
{
        require_once(__DIR__ . "/Connection/tcp.php");
        require_once(__DIR__ . "/Error/NotFound.php");
        require_once(__DIR__ . "/Wrapper/set.php");
        require_once(__DIR__ . "/Wrapper/get.php");
        require_once(__DIR__ . "/Wrapper/del.php");
        
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
                        $tcp_ctx->initialize()->set_host($host)->set_port($port)->create_ctx();
                        $this->tcp_cur = $tcp_ctx;
                }

                public function set($key, $value) 
                {
                        $set = new \FadhilRiyanto\Rocksclient\Wrapper\op_set();
                        // var_dump();
                        $this->tcp_cur->write($set->set_operand1($key)->set_operand2($value)->getquery());
                }

                public function get($key) 
                {
                        $set = new \FadhilRiyanto\Rocksclient\Wrapper\op_get();
                        // var_dump();
                        $this->tcp_cur->write($set->set_operand1($key)->set_operand2()->getquery());
                        $ret = $this->tcp_cur->recv_wait();

                        if ($ret == "\n") {
                                throw new \FadhilRiyanto\Rocksclient\Exceptions\NotFoundException();
                        } else {
                                return $ret;
                        }
                }

                public function del($key): bool
                {
                        $set = new \FadhilRiyanto\Rocksclient\Wrapper\op_del();
                        // var_dump();
                        $this->tcp_cur->write($set->set_operand1($key)->set_operand2()->getquery());
                        $ret = $this->tcp_cur->recv_wait();

                        if ($ret === hex2bin("07080A")) {
                                return true;
                        } else {
                                return false;
                        }
                }

                public function __destruct()
                {
                        $this->tcp_cur->destroy_ctx();
                }
        }
}