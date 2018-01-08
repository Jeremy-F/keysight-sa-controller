<?php
namespace Jeremyfornarino\Ksac\SignalAnalyzer;
require_once "Buttons.php";
require_once "ViewState.php";
/**
 * Class SignalAnalyzer
 * @author Jérémy Fornarino
 */
class SignalAnalyzer{
    /** @var string */
    private $hostname;
    /** @var int */
    private $port;
    /** @var string */
    private $protocol;
    /** @var string */
    private $dirname;
    /** @var ViewState */
    private $viewState;

    /**
     * SignalAnalyzer constructor.
     * @param string $hostname
     * @param int $port
     * @param string $protocol
     * @param string $dirname
     */
    public function __construct(string $hostname, int $port = 80, string $protocol = "http", string $dirname = "Agilent.SA.WebInstrument"){
        $this->hostname = $hostname;
        $this->port = $port;
        $this->protocol = $protocol;
        $this->dirname = $dirname;
        $this->viewState = null;
    }

    /**
     * Simulates a click on the button indicated in parameter
     * @param string $buttonString Buttons
     * @return bool The result will always be true, and loop if we can not press the button.
     * This choice was made to "get around" the electrical breaks present in the school.
     * @throws \Exception
     */
    public function pressButton(string $buttonString) : bool{
        $this->loadViewState();
        $curl = curl_init($this->url("FrontPanelKeys.aspx"));
        curl_setopt_array($curl, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS =>
                "__VIEWSTATE=".urlencode($this->getViewState()->getViewState())."&".Buttons::getConstantKeyFromString($buttonString)."=".urlencode($buttonString),
            CURLOPT_HEADER => array("Content-Type:application/x-www-form-urlencoded"),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 60
        ]);
        curl_exec($curl);
        if(curl_getinfo($curl, CURLINFO_HTTP_CODE) != 200){
            curl_close($curl);
            sleep(1);
            return $this->pressButton($buttonString);
        }
        curl_close($curl);
        return true;
    }
    /**
     * Allows you to type a complete number in one command on the analyzer
     * @param int $number The number to press on the analyzer
     * @return bool true when is finish, false if the number is < 0
     * @throws \Exception
     */
    public function pressNumber(int $number) : bool{
        if($number > 0) {
            $numberString = (string)$number;
            for($i = 0; $i < strlen($numberString); $i++){
                $this->pressButton(
                    Buttons::getConstantKeyFromInt(
                        intval($numberString[$i])
                    )
                );
            }
            return true;
        }return false;
    }
    /**
     * @param string $action
     * @return string
     */
    public function url(string $action = "") : string{
        $url  = $this->getProtocol()."://";
        $url .= $this->getHostname().":";
        $url .= $this->getPort()."/";
        $url .= (strlen($this->getDirname()) > 0)?$this->getDirname()."/":"";
        $url .= $action;
        return $url;
    }
    /**
     * Loading of viewState necessary for the use of the analyzer.
     * @return ViewState
     * @throws \Exception
     */
    public function loadViewState(): ViewState{
        if(!is_null($this->viewState) && $this->viewState instanceof ViewState)
            return $this->viewState;
        $this->viewState = new ViewState($this);
        $this->viewState->loadViewState();
        return $this->viewState;
    }

    /**
     * Loading CSV Trace
     * @param int $traceNumber Number of the trace
     * @return string The CSV file data
     */
    public function loadCSVTrace(int $traceNumber = 1): string{
        $url = $this->url("Trace{$traceNumber}.csv");
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 60
        ]);
        $result = curl_exec($curl);
        $curl_result_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if($curl_result_code != 200){
            curl_close($curl);
            return $this->loadCSVTrace($traceNumber);
        }
        curl_close($curl);
        return $result;
    }








    /**
     * Return the link or the IP adress of the signal analyzer
     * @return string hostname
     */
    public function getHostname(): string{
        return $this->hostname;
    }
    /**
     * Return the web server port of the signal analyzer
     * @return int web server port
     */
    public function getPort(): int{
        return $this->port;
    }

    /**
     * Return the protocol (http or https)
     * @return string
     */
    public function getProtocol(): string{
        return $this->protocol;
    }

    /**
     * @return string
     */
    public function getDirname(): string{
        return $this->dirname;
    }
    /**
     * @return ViewState
     */
    private function getViewState():ViewState{
        return $this->viewState;
    }
}