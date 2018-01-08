<?php

require_once "SignalAnalyzer/SignalAnalyzer.php";

use Jeremyfornarino\Ksac\SignalAnalyzer\Buttons;
use Jeremyfornarino\Ksac\SignalAnalyzer\SignalAnalyzer;


$ip = "147.215.193.22";

/** @var SignalAnalyzer $sa */
$sa = new SignalAnalyzer($ip);

try {
    $sa->pressButton(Buttons::freq);
} catch (Exception $e) {
    echo $e->getMessage();
}