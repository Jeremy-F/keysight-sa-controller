<?php

require_once "SignalAnalyzer/SignalAnalyzer.php";

use Jeremyfornarino\Ksac\SignalAnalyzer\Buttons;
use Jeremyfornarino\Ksac\SignalAnalyzer\SignalAnalyzer;


$ip = "YOURIPSA";

/** @var SignalAnalyzer $sa */
$sa = new SignalAnalyzer($ip);
var_dump($sa->loadTraceAsArray());