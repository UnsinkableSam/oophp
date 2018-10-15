<?php

namespace sapt17\Dice ;

/**
 * Dice game class.
 */

class Hand implements HistogramInterface
{
    use HistogramTrait2;


    public $overallTotal = 0;

    public function __construct(string $name, int $dice = 6)
    {

        $this->name = $name;
        $this->dices = [];
        $this->dicesChecked = [];
        $this->histogram = 1;
        if (!isset($this->total)) {
            $this->serie = [];
            $this->total = 0;
            for ($i=0; $i < $dice; $i++) {
                $newDice = new Dice();
                array_push($this->dices, $newDice);
            }
        }
    }


    public function check()
    {
        // $this->total = 0;
        $this->dicesChecked = [];
        for ($i = 0; $i < count($this->dices); $i++) {
            if ((int)$this->dices[$i]->number == 1) {
                $this->total = 0;
                $this->dices = [];
                break;
            }
            print_r($this->dicesChecked);
            array_push($this->dicesChecked, $this->dices[$i]);
            $this->total += $this->dices[$i]->number;
        }
        if ($this->total == 0) {
            $this->dicesChecked = [];
        }
    }



    public function random()
    {
        $number = rand(1, 100);
        return $number;
    }


    public function roll()
    {
        $this->dices = [];
        for ($i=0; $i < 1; $i++) {
            $newDice = new Dice();
            array_push($this->dices, $newDice);
        }
        $this->check();
        $this->histoRoll();
    }

    public function getHistogramMax()
    {
        return 6;
    }

    public function getLastRoll()
    {
        if (count($this->dices) > 0) {
            return $this->dicesChecked[count($this->dicesChecked) -1];
        } else {
            return ;
        }
    }

    public function histoRoll()
    {
        foreach ($this->dicesChecked as $value) {
            // print_r($value->number);
            array_push($this->serie, $value->number);
        }
        return $this->getLastRoll();
    }


    public function save()
    {
        $this->overallTotal += $this->total;
    }
}
