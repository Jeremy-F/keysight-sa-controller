<?php
namespace Jeremyfornarino\Ksac\DataAnalyzer\Column;
require_once __DIR__."/../../../../../vendor/autoload.php";
class ColumnDefaultValue extends Column {
    private $defaultValue;

    /**
     * ColumnDefaultValue constructor.
     * @param $defaultValue
     * @param string $columnName
     */
    public function __construct($defaultValue, $columnName = "defaultValue"){
        parent::__construct($columnName);
        $this->defaultValue = $defaultValue;
    }

    public function calculateValue($currentFrequency, $currentAbsolutPower, $data = []){
        return $this->getDefaultValue();
    }

    public function getDefaultValue(){
        return $this->defaultValue;
    }
}