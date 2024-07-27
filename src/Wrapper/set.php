<?php

namespace FadhilRiyanto\Rocksclient\Wrapper {
        
        require_once(__DIR__ . "/base_instruction.php");

        class op_set implements base_instruction
        {
                private $op_arr = [];
                
                static $op_code = "set0";

                public function __construct()
                {
                        array_push($this->op_arr, $this::$op_code);
                }

                public function getquery()
                {
                        return implode("\r\n\r\n", $this->op_arr);
                }

                public function set_operand1(string $op1) 
                {
                        array_push($this->op_arr, $op1);
                        return $this;
                }

                public function set_operand2(string $op2 = null) 
                {
                        array_push($this->op_arr, $op2);
                        return $this;
                }


        }
}