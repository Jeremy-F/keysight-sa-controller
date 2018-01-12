<?php
namespace Jeremyfornarino\Ksac\SignalAnalyzer\SoftkeyButton;

require_once __DIR__."/../../../../../vendor/autoload.php";

class TraceDetectorType extends SoftkeyButton{
    const clearWrite = 2;
    const traceAverage = 3;
    const maxHold = 4;
    const minHold = 5;
}