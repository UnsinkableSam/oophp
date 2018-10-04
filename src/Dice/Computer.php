<?php

namespace sapt17\Dice ;

/**
 * Dice game class.
 */
class Computer extends Hand
{
/**
* Contruct that doesn't take any parameters.
* It does hold 3 @var roll, @var total, @var compahand.
*
*/
    public function __construct(int $dices = 6)
    {

        parent::__construct("Computer", $dices);

    }

    /**
    * This rolls the rice for the computer
    */
    public function compRoll($playerTotal)
    {
           $this->roll();
        if ($playerTotal > $this->total) {
            $this->roll();
        }
    }

    public function resetTotal(int $sum)
    {
        $this->overallTotal = $sum;
    }

    public function setTotal(int $sum)
    {
        $this->overallTotal += $sum;
    }
}
