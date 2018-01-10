<?php

use Jeremyfornarino\Ksac\SignalAnalyzer\FrequencyType;

require_once __DIR__."/../SignalAnalyzer/SignalAnalyzer.php";

class FrequencyTypeTest extends \PHPUnit\Framework\TestCase {

    public function testFrequencyTypeToButtonsValues(){
        $this->assertEquals("Softkey 2", FrequencyType::softKeyButtonFromInt(FrequencyType::center));
        $this->assertEquals("Softkey 3", FrequencyType::softKeyButtonFromInt(FrequencyType::start));
        $this->assertEquals("Softkey 4", FrequencyType::softKeyButtonFromInt(FrequencyType::stop));
    }

}