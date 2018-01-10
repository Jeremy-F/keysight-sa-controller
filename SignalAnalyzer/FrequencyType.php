<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeremyfornarino
 * Date: 10/01/2018
 * Time: 11:55
 */

namespace Jeremyfornarino\Ksac\SignalAnalyzer;


class FrequencyType{
    const start =  3;
    const center = 2;
    const stop = 4;

    public static function frequencyTypeToSoftKeyButton(int $frequencyType){
        return Buttons::getConstantKeyFromString("softkey".((string) $frequencyType) );
    }
}