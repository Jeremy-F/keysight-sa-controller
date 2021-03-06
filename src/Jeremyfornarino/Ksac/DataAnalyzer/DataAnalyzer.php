<?php
namespace Jeremyfornarino\Ksac\DataAnalyzer;
use Jeremyfornarino\Ksac\DataAnalyzer\Column\Column;
use Jeremyfornarino\Ksac\SignalAnalyzer\SignalAnalyzer;


abstract class DataAnalyzer
{
    /**
     * @var array 
     */
    private $columns;
    /**
     * @var SignalAnalyzer 
     */
    private $signalAnalyzer;

    public function __construct(SignalAnalyzer $signalAnalyzer, array $columns)
    {
        $this->columns = $columns;
        $this->signalAnalyzer = $signalAnalyzer;
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @return SignalAnalyzer
     */
    public function getSignalAnalyzer(): SignalAnalyzer
    {
        return $this->signalAnalyzer;
    }
    abstract function getDataFormated();

    /**
     * For a given pair "frequency, absolute value" we calculate the values for each column
     *
     * @param  $currentFrequency
     * @param  $currentAbsolutPower
     * @param  array               $data
     * @return array
     */
    protected function calculateColumnsDataValues($currentFrequency, $currentAbsolutPower,$data = []) : array
    {
        $columnsDataValues = [];
        /**
 * @var Column $columns 
*/
        foreach($this->getColumns() AS $columns){
            $columnsDataValues[$columns->getName()] = $columns->getValueFor($currentFrequency, $currentAbsolutPower, $data);
        }
        return $columnsDataValues;
    }

    /**
     * Loading data in a table, with the calculation of the values for each column
     *
     * For each pair "frequency, absolute power" we create a table adding
     *  in addition the calculated values for each column such as
     *  [   frequency => value, absolutePower => value,
     *      columnAName => calculatedValueForColumnA,
     *      columnbName => calculatedValueForColumnB
     *      ...
     *  ]
     *
     * @return array
     */
    public function loadDataAsArray(): array
    {
        $traceAsArray = $this->getSignalAnalyzer()->loadTraceAsArray();
        $resultArray = [];
        foreach ($traceAsArray AS $frequency => $absolutePower) {
            $currentResultArray = [
                "frequency" => floatval($frequency),
                "absolutePower" => floatval($absolutePower)
            ];
            $currentResultArray = array_merge($currentResultArray, $this->calculateColumnsDataValues($frequency, $absolutePower, $traceAsArray));
            $resultArray[] = $currentResultArray;
        }
        return $resultArray;
    }

    /**
     * Allows you to directly save formatted data in the file specified as parameter
     *
     * @param  string $filepath File where the data are stored
     * @return bool True if the recording was done well, else false
     */
    public function saveDataIn(string $filepath) : bool 
    {
        return file_put_contents($filepath, $this->getDataFormated());
    }
}
