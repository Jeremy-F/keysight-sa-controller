<?php

namespace Jeremyfornarino\Ksac\DataAnalyzer;
use Jeremyfornarino\Ksac\SignalAnalyzer\SignalAnalyzer;
require_once __DIR__."/../../../../vendor/autoload.php";



class DataAnalyzerJSON extends DataAnalyzer{
    public function __construct(SignalAnalyzer $signalAnalyzer, array $columns){
        parent::__construct($signalAnalyzer, $columns);
    }
    function getDataFormated() : string {
        $resultArray = $this->loadDataAsArray();
        return json_encode($resultArray);
    }
}