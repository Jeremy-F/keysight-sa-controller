<?php
namespace Jeremyfornarino\Ksac\SignalAnalyzer\SoftkeyButton;
require_once __DIR__."/../../../../../vendor/autoload.php";

class ModeType extends SoftkeyButton{
    const spectrumAnalyzer = 1;
    const iqAnalyzerBasic = 2;
    const VSA89601 = 3;
    const pulse = 4;
}