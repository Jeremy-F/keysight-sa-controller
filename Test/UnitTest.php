<?php

use Jeremyfornarino\Ksac\SignalAnalyzer\FrequencyType;
use Jeremyfornarino\Ksac\SignalAnalyzer\Unit;

require_once __DIR__."/../SignalAnalyzer/SignalAnalyzer.php";

class UnitTest extends \PHPUnit\Framework\TestCase {
    public function testUnitToButtonsValues(){
        $this->assertEquals("Softkey 1", Unit::unitToSoftkeyButton(Unit::GHz));
        $this->assertEquals("Softkey 2", Unit::unitToSoftkeyButton(Unit::MHz));
        $this->assertEquals("Softkey 3", Unit::unitToSoftkeyButton(Unit::KHz));
        $this->assertEquals("Softkey 4", Unit::unitToSoftkeyButton(Unit::Hz));
    }
}