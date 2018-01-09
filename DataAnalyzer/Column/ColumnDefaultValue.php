<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeremyfornarino
 * Date: 09/01/2018
 * Time: 13:16
 */

namespace Jeremyfornarino\Ksac\DataAnalyzer\Column;


class ColumnDefaultValue extends Column {
    private $defaultValue;

    /**
     * ColumnDefaultValue constructor.
     * @param $defaultValue
     * @param string $columnName
     */
    public function __construct($defaultValue, $columnName = "defaultValue"){
        super($columnName);
        $this->defaultValue = $defaultValue;
    }

    public function calculateValue($currentFrequency, $currentAbsolutPower, $data = []){
        return $this->getDefaultValue();
    }

    public function getDefaultValue(){
        return $this->defaultValue;
    }
}