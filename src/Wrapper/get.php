<?php

namespace FadhilRiyanto\Rocksclient\Wrapper {
        
        require_once(__DIR__ . "/base_instruction.php");
        require_once(__DIR__ . "/../Const/Separator.php");

        class op_get implements base_instruction
        {
                private $op_arr = [];

                /* padding 0 */
                static $op_code = "get0";

                public function __construct()
                {
                        array_push($this->op_arr, $this::$op_code . 
                                \FadhilRiyanto\Rocksclient\Const\Separator::$separator);
                }

                public function getquery()
                {
                        return implode("", $this->op_arr);
                }

                public function set_operand1(string $op1) 
                {
                        array_push($this->op_arr, "op1" . $op1 . 
                                \FadhilRiyanto\Rocksclient\Const\Separator::$separator);
                        return $this;
                }

                public function set_operand2(string $op2 = null) 
                {
                        if ($op2 == null) 
                                $op2 = "0";
                        array_push($this->op_arr, "op2" . $op2 . 
                                \FadhilRiyanto\Rocksclient\Const\Separator::$separator);
                        return $this;
                }


        }
}