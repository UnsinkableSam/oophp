<?php

namespace sapt17\Dice ;

/**
 * Dice game class.
 */
class Dice
{

/**
* Construct that doesn't take any parameters.
*/
    public function __construct()
    {
        $this->lastRoll = [];
        $this->number = $this->random();
        $this->rerolls = 2;
    }

/**
* THis random fun randoms the number on the dice.
* But only while you got rerolls. Max is 2.
*/

    public function random()
    {
        $number = rand(1, 6);
        array_push($this->lastRoll, $number);

        return $number;
    }


    public function getLastRoll()
    {
        return $this->lastRoll[count($this->lastRoll) - 1];
    }
}
