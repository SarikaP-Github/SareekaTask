<?php
declare(strict_types = 1);

require_once('vendor/autoload.php');

use Bfg\Task\PinGenerator;

$obj = new PinGenerator;
$pins = $obj->generate(5, 3); // argument passed as per document of task 

foreach($pins as $key => $pin) {
    echo ($key+1) .'=> <b>'.$pin.'<b>', '<br>';
}
//print_r($pins);