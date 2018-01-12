<?php


require_once "SignalAnalyzer/SignalAnalyzer.php";
require_once "DataAnalyzer/DataAnalyzer.php";

use Jeremyfornarino\Ksac\DataAnalyzer\DataAnalyzerCSV;
use Jeremyfornarino\Ksac\SignalAnalyzer\SignalAnalyzer;
use Jeremyfornarino\Ksac\SignalAnalyzer\TraceDetectorType;
use Jeremyfornarino\Ksac\SignalAnalyzer\Unit;
use Jeremyfornarino\Ksac\DataAnalyzer\Column\ColumnDefaultValue;

$ip = json_decode(file_get_contents("config.json"))->hostname;

echo $ip;
/** @var SignalAnalyzer $sa */
$sa = new SignalAnalyzer($ip);
$daCSV = new \Jeremyfornarino\Ksac\DataAnalyzer\DataAnalyzerJSON($sa, array(
    new ColumnDefaultValue(time())
));
try {
    $sa->restoreModeSetupDefaults();
    $sa->updateTraceType(TraceDetectorType::traceAverage);
    $sa->updateFrequency(775, 825, Unit::MHz);
    $sa->updateAverageHoldNumber(1);
    $sa->updateRBW(390, Unit::KHz);

    for($i = 50; $i < 500; $i+=10){
        $sa->updatePointsNumber($i);
        $jsonString = $daCSV->getDataFormated();
        $jsonObj = json_decode($jsonString);
        echo "\nAcquisitions : [".$i."|".count($jsonObj)."]";
    }

}catch (Exception $e) {
    echo "Error : ".$e->getMessage();
}