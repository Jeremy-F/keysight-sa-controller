<?php

require_once "SignalAnalyzer/SignalAnalyzer.php";
require_once "DataAnalyzer/DataAnalyzer.php";
require_once "DataAnalyzer/DataAnalyzerJSON.php";
require_once "DataAnalyzer/DataAnalyzerCSV.php";
require_once "DataAnalyzer/Column/Column.php";

use Jeremyfornarino\Ksac\DataAnalyzer\Column\ColumnDefaultValue;
use Jeremyfornarino\Ksac\DataAnalyzer\DataAnalyzerJSON;
use Jeremyfornarino\Ksac\SignalAnalyzer\Buttons;
use Jeremyfornarino\Ksac\SignalAnalyzer\SignalAnalyzer;


$ip = "YOURIPSA";

/** @var SignalAnalyzer $sa */
$sa = new SignalAnalyzer($ip);
$currentTime = time();
$dataAnalyzer = new DataAnalyzerJSON($sa, [
    new ColumnDefaultValue($currentTime, "currentTime")
]);
var_dump($dataAnalyzer->getDataFormated());