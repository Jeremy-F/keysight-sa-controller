<?php
namespace Jeremyfornarino\Ksac\SignalAnalyzer;

class SoftkeyButton{
    public static function softKeyButtonFromInt(int $frequencyType){
        return Buttons::getConstantValueFromString("softkey".((string) $frequencyType) );
    }
}
class Unit extends SoftkeyButton {
    const Hz = 4;
    const KHz = 3;
    const MHz = 2;
    const GHz = 1;
}
class FrequencyType extends SoftkeyButton{
    const start = 3;
    const center = 2;
    const stop = 4;
}
class TraceDetectorType extends SoftkeyButton{
    const clearWrite = 2;
    const traceAverage = 3;
    const maxHold = 4;
    const minHold = 5;
}
class ModeType extends SoftkeyButton{
    const spectrumAnalyzer = 1;
    const iqAnalyzerBasic = 2;
    const VSA89601 = 3;
    const pulse = 4;
}