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
}
