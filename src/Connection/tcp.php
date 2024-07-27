<?php 

declare(strict_types=1);

namespace FadhilRiyanto\Rocksclient\Connection {
        require_once(__DIR__ . "/../Error/TCPException.php");

        define("U_INT16_MAX", 65535);

        class TCP
        {

                private string $host;
                private int $port;
                private \Socket $fd;

                public function initialize()
                {
                        return $this;
                }

                public function set_host(string $host) 
                {
                        $this->host = $host;
                        return $this;
                }

                public function set_port(int $port)
                {
                        $this->port = $port;
                        return $this;
                }

                private function check_socket_ext() {
                        if (!extension_loaded("sockets")) {
                                throw new \FadhilRiyanto\Rocksclient\Exceptions\TCPException();
                        }
                }

                private function init_socket()
                {
                        $this->fd = socket_create(AF_INET, SOCK_STREAM, 0);
                        if ($this->fd === false) {
                                printf("err: %s\n", socket_strerror(socket_last_error()));
                        }
                }

                private function socket_connect()
                {
                        socket_connect($this->fd, $this->host, $this->port);
                }

                public function create_ctx()
                {
                        $this->check_socket_ext();
                        $this->init_socket();
                        $this->socket_connect();
                        return $this;
                        
                }

                public function write(string $data)
                {
                        socket_send($this->fd, $data, strlen($data), MSG_DONTWAIT);
                }

                public function recv_wait()
                {
                        // $bufptr = null;
                        $bufptr = socket_read($this->fd, U_INT16_MAX, PHP_NORMAL_READ);
                        return $bufptr;
                }

                public function destroy_ctx() 
                {
                        socket_close($this->fd);
                }
        }
}

