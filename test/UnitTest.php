<?php


use Jeremyfornarino\Ksac\SignalAnalyzer\SoftkeyButton\Unit;

require_once __DIR__."/../vendor/autoload.php";
class UnitTest extends \PHPUnit\Framework\TestCase {
    public function testUnitToButtonsValues(){
        $this->assertEquals("Softkey 1", Unit::softKeyButtonFromInt(Unit::GHz));
        $this->assertEquals("Softkey 2", Unit::softKeyButtonFromInt(Unit::MHz));
        $this->assertEquals("Softkey 3", Unit::softKeyButtonFromInt(Unit::KHz));
        $this->assertEquals("Softkey 4", Unit::softKeyButtonFromInt(Unit::Hz));
    }
}