<?php

namespace sapt17\Dice ;

/**
 * Dice game class.
 */

class Hand
{

    public $overallTotal = 0;

    public function __construct(string $name, int $dice = 6)
    {
        $this->name = $name;
        $this->dices = [];
        $this->dicesChecked = [];
        if (!isset($this->total)) {
            $this->total = 0;
            for ($i=0; $i < $dice; $i++) {
                array_push($this->dices, new Dice());
            }
        }


    }


    public function check()
    {
        $this->total = 0;
        $this->dicesChecked = [];
        for ($i = 0; $i < count($this->dices); $i++) {
            if ((int)$this->dices[$i]->number == 1) {
                $this->total = 0;
                $this->dices = [];
                break;
            }
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
            array_push($this->dices, new Dice());
        }
        $this->check();
    }
}
