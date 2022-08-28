<?php

class OwnerPassword {
    function echoMessage() {
        var_dump($_GET);
        echo "Owner Passord";
    }
}

$op = new OwnerPassword();
$op->echoMessage();
