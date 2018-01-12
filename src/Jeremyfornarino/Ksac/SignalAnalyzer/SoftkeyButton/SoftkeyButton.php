<?php
namespace Jeremyfornarino\Ksac\SignalAnalyzer\SoftkeyButton;
use Jeremyfornarino\Ksac\SignalAnalyzer\Buttons;


class SoftkeyButton
{
    public static function softKeyButtonFromInt(int $frequencyType)
    {
        return Buttons::getConstantValueFromString("softkey".((string) $frequencyType));
    }
}
