<?php
namespace Jeremyfornarino\Ksac\DataAnalyzer\Column;
abstract class Column
{
    /**
     * @var string 
     */
    private $name;

    /**
     * Column constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    abstract public function calculateValue($currentFrequency, $currentAbsolutPower, $data = []);

    public function getValueFor($currentFrequency, $currentAbsolutPower, $data = [])
    {
        return $this->calculateValue($currentFrequency, $currentAbsolutPower, $data);
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}