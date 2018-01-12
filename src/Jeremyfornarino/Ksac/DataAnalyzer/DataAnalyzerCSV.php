<?php
namespace Jeremyfornarino\Ksac\DataAnalyzer;
use Jeremyfornarino\Ksac\SignalAnalyzer\SignalAnalyzer;
require_once __DIR__."/../../../../vendor/autoload.php";

class DataAnalyzerCSV extends DataAnalyzer{
    public function __construct(SignalAnalyzer $signalAnalyzer, array $columns){
        parent::__construct($signalAnalyzer, $columns);
    }
    function getDataFormated() : string {
        $dataAsArray = $this->loadDataAsArray();
        if(! ( count($dataAsArray) > 0) ) return "";
        $columnsName = array_keys($dataAsArray[0]);
        $retString = join(",", $columnsName)."\n";
        foreach($dataAsArray AS $currentData){
            foreach($currentData AS $value){
                if(is_numeric($value)) $retString .= (string) $value;
                elseif (is_string($value)) $retString .= "\"".$value."\"";
                $retString .= ",";
            }
            $retString = substr($retString, 0, -1)."\n";
        }
        return $retString;
    }
}