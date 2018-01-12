<?php
namespace Jeremyfornarino\Ksac\SignalAnalyzer\SoftkeyButton;
use Jeremyfornarino\Ksac\SignalAnalyzer\Buttons;

require_once __DIR__."/../../../../../vendor/autoload.php";

class SoftkeyButton{
    public static function softKeyButtonFromInt(int $frequencyType){
        return Buttons::getConstantValueFromString("softkey".((string) $frequencyType) );
    }
}
