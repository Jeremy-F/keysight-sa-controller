<?php

use Jeremyfornarino\Ksac\SignalAnalyzer\FrequencyType;

require_once __DIR__."/../SignalAnalyzer/SignalAnalyzer.php";

class FrequencyTypeTest extends \PHPUnit\Framework\TestCase {

    public function testFrequencyTypeToButtonsValues(){
        $this->assertEquals("Softkey 2", FrequencyType::frequencyTypeToSoftKeyButton(FrequencyType::center));
        $this->assertEquals("Softkey 3", FrequencyType::frequencyTypeToSoftKeyButton(FrequencyType::start));
        $this->assertEquals("Softkey 4", FrequencyType::frequencyTypeToSoftKeyButton(FrequencyType::stop));
    }

}