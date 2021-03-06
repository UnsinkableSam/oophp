<?php

namespace sapt17\Dice;

class Game
{

    public function __construct(string $name, int $dices, object $app)
    {
        $this->active = true;
        if (!$app->session->get("Hand")) {
            $app->session->set("startPlayer", new Hand($name, $dices));
            $app->session->set("startComputer", new Computer($dices));
            $app->session->set("Hand", new Hand($name, $dices));
            $app->session->set("computer", new Computer($dices));
            $app->session->set("round", 0);
        }

        $this->player = $app->session->get("Hand");
        $this->computer = $app->session->get("computer");
        $this->startPlayer = $app->session->get("startPlayer");
        $this->startComputer = $app->session->get("startComputer");
        $this->turn = $app->session->get("turn") ?? null;
    }

    /**
    * Roll for for the player
    */
    public function playerRoll($app)
    {
        $this->player->roll();
        if ($this->player->total == 0) {
            $this->turn = $app->session->set("turn", 1);
        }


    }


/**
* ROll for the computer.
*/
    public function computerRoll($app)
    {
        $this->computer->compRoll($this->player->total);
        if ($this->computer->total == 0) {
            $this->turn = $app->session->set("turn", 2);
        } else {
            $this->setComputerTotal($this->computer->total, $app);
            $this->computer->total = 0;
        }
    }


/**
* compare to decied who wins.
*/
    public function compare()
    {
        if ($this->player->overallTotal >= 100) {
            echo "Winner player";
            $this->active = false;
        } elseif (100 <= $this->computer->overallTotal) {
            echo "Winner computer";
            $this->active = false;
        }
    }


/**
* dummy reset.
*/

    public function reset($app)
    {
        // $_SESSION["round"] = 0;
        $app->session->set("round", 0);
        $this->turn = null;
        $this->startPlayer->dices = [];
        $this->startPlayer->dicesChecked = [];
        $this->startComputer->dices = [];
        $this->startComputer->dicesChecked = [];
        $this->startPlayer->total = 0;
        $this->startComputer->total = 0;
        $this->active = true;
        $this->player->total = 0;
        $this->computer->total = 0;
        $this->player->dices = [];
        $this->player->dicesChecked = [];
        $this->computer->dices = [];
        $this->computer->dicesChecked = [];
        $this->player->overallTotal = 0;
        $this->computer->resetTotal(0);
        $app->session->destroy();
    }


    /**
    * Sets player total overall score
    */
    public function setPlayerTotal(int $sum, $app)
    {
        $this->player->overallTotal += $sum;
        $this->start(1, $app);






    }
    /**
    * setComputerTotal sets the computers total score.
    **/
    public function setComputerTotal(int $sum, $app)
    {
        $this->computer->setTotal($sum);
        $this->start(2, $app);

        // echo " computer 2 " . $this->turn;
    }


    // public function round()
    // {
    //     $_SESSION["round"] += 1;
    // }
    //
    //
    // public function getRound()
    // {
    //     return $_SESSION["round"];
    // }


    /**
    * set the turn for who goes first.
    */
    public function start(int $number, $app)
    {
        $app->session->set("turn", $number);
    }


    /**
    * first roll to see who goes first.
    */
    public function firstRoll()
    {
        $this->startPlayer->roll();
        $this->startComputer->compRoll($this->player->total);
    }
}
