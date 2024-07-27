<?php
require_once("../src/Rocksclient.php");

$rockserver = new FadhilRiyanto\Rocksclient("127.0.0.1", 8998);

// for($i = 0; $i < 100; $i++) {
//         $rockserver->set("randomkeyof" . $i, "this is value sent by PHPaROCKS! indexof " . $i);
        
// }

for($i = 0; $i < 100; $i++) {
        echo $rockserver->get("randomkeyof" . $i);
}
