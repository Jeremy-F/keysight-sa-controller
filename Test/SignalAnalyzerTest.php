<?php
require_once __DIR__."/../SignalAnalyzer/SignalAnalyzer.php";
use Jeremyfornarino\Ksac\SignalAnalyzer\SignalAnalyzer;
class SignalAnalyzerTest extends \PHPUnit\Framework\TestCase {
    public function setUp(){
        parent::setUp();
    }

    public function testUrl(){
        $sa = new SignalAnalyzer("hostname", 80, "protocol", "dirname");
        $this->assertSame("protocol://hostname:80/dirname/", $sa->url());
        $this->assertSame("protocol://hostname:80/dirname/extdata", $sa->url("extdata"));
    }
    public function testExportTraceAsArray(){
        $strTrace = "123.456,-12.34\n";
        $strTrace .= "123,-12\n";
        $strTrace .= "456.456,0\n";
        $strTrace .= "456,0\n";
        $strTrace .= "789.123,2\n";
        $strTrace .= "789,2\n";
        $exportTraceAsArray = SignalAnalyzer::exportTraceAsArray($strTrace);
        $this->assertEquals(6, count($exportTraceAsArray), json_encode($exportTraceAsArray));
        $this->assertEquals(-12.34, $exportTraceAsArray['123.456'], json_encode($exportTraceAsArray));
        $this->assertEquals(-12, $exportTraceAsArray['123'], json_encode($exportTraceAsArray));
        $this->assertEquals(0, $exportTraceAsArray['456.456'], json_encode($exportTraceAsArray));
        $this->assertEquals(0, $exportTraceAsArray['456'], json_encode($exportTraceAsArray));
        $this->assertEquals(2, $exportTraceAsArray['789.123'], json_encode($exportTraceAsArray));
        $this->assertEquals(2, $exportTraceAsArray['789'], json_encode($exportTraceAsArray));
    }
}
