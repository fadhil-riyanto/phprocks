<?php

namespace FadhilRiyanto\Rocksclient\Wrapper {
        interface base_instruction {
                
                public function getquery();
                public function set_operand1(string $data);
                public function set_operand2(string $data = null);
        }
}