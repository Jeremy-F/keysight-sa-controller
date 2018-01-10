<?php

namespace Jeremyfornarino\Ksac\SignalAnalyzer;
require_once "Buttons.php";
class Buttons{
    /** @var string */
    const freq = "Freq/Channel";
    /** @var string */
    const ret = "Return";
    /** @var string */
    const softkey7 = "Softkey 7";
    /** @var string */
    const softkey6 = "Softkey 6";
    /** @var string */
    const softkey5 = "Softkey 5";
    /** @var string */
    const softkey4 = "Softkey 4";
    /** @var string */
    const softkey3 = "Softkey 3";
    /** @var string */
    const softkey2 = "Softkey 2";
    /** @var string */
    const softkey1 = "Softkey 1";
    /** @var string */
    const enter2 = "Enter";
    /** @var string */
    const select = "Select";
    /** @var string */
    const tabb = "Tab&lt;-";
    /** @var string */
    const tabf = "Tab-&gt;";
    /** @var string */
    const fullscreen = "Full Screen";
    /** @var string */
    const nextwindow = "Next Window";
    /** @var string */
    const zoom = "Zoom";
    /** @var string */
    const splitscreen = "Split Screen";
    /** @var string */
    const backspace = "Bk.Sp &lt;-";
    /** @var string */
    const delete = "Del";
    /** @var string */
    const cancel = "Cancel/Esc";
    /** @var string */
    const enter1 = "Enter";
    /** @var string */
    const minus = "_";
    /** @var string */
    const deci = ".";
    /** @var string */
    const zero = "0";
    /** @var string */
    const nine = "9";
    /** @var string */
    const eight = "8";
    /** @var string */
    const seven = "7";
    /** @var string */
    const six = "6";
    /** @var string */
    const five = "5";
    /** @var string */
    const four = "4";
    /** @var string */
    const three = "3";
    /** @var string */
    const two = "2";
    /** @var string */
    const one = "1";
    /** @var string */
    const down = "Down";
    /** @var string */
    const left = "Left";
    /** @var string */
    const right = "Right";
    /** @var string */
    const up = "Up";
    /** @var string */
    const restart = "Restart";
    /** @var string */
    const cont = "Cont";
    /** @var string */
    const single = "Single";
    /** @var string */
    const userpreset = "User Preset";
    /** @var string */
    const quicksave = "Quick Save";
    /** @var string */
    const modePreset = "Mode Preset";
    /** @var string */
    const system = "System";
    /** @var string */
    const markerfunction = "Marker Fn";
    /** @var string */
    const markerNext = "Marker -&gt;";
    /** @var string */
    const peaksearch = "Peak Search";
    /** @var string */
    const mareker = "Marker";
    /** @var string */
    const sweepcontrol = "Swp/Control";
    /** @var string */
    const meassetup = "Meas Setup";
    /** @var string */
    const meas = "Meas";
    /** @var string */
    const trigger = "Trigger";
    /** @var string */
    const modesetup = "Mode Setup";
    /** @var string */
    const mode = "Mode";
    /** @var string */
    const source = "Source";
    /** @var string */
    const trace = "Trace/Det";
    /** @var string */
    const amptd = "Amptd/YScale";
    /** @var string */
    const bw = "BW";
    /** @var string */
    const view = "View/Display";
    /** @var string */
    const span = "Span/XScale";
    /** @var string */
    const autocouple = "Auto Couple";
    /** @var string */
    const input = "Input/Output";

    /**
     * Return the name of the buttons'constant
     * associated with the string in parameter
     * @param $string string Button name
     * @return string Buttons\Constant name
     */
    public static function getConstantKeyFromString(string $string): string
    {
        foreach (Buttons::getConstants() as $constantKey => $constantValue) {
            if ($constantValue === $string) {
                return $constantKey;
            }
        }
        return "";
    }

    /**
     * Return the name of the buttons'constant
     * associated with the string in parameter
     * @param $int int Button name
     * @return string Buttons\Constant name
     */
    public static function getConstantKeyFromInt(int $int): string
    {
        return self::getConstantKeyFromString((string)$int);
    }

    /**
     * Return all constants of Buttons
     * @return array
     */
    private static function getConstants()
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
