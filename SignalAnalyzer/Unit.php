<?php
namespace Jeremyfornarino\Ksac\SignalAnalyzer;
class Unit{
    const Hz = 4;
    const KHz = 3;
    const MHz = 2;
    const GHz = 1;

    public static function unitToSoftkeyButton(int $unit){
        return Buttons::getConstantKeyFromString("softkey".(string) ($unit));
    }
}