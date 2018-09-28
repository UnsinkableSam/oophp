<?php

namespace sapt17\Dice ;

class Game
{

    public function __construct(string $name, int $dices)
    {
        $this->active = true;
        $this->session =  new Session();
        if (!isset($_SESSION["Hand"])) {
            $this->session->set("startPlayer", new Hand($name, $dices));
            $this->session->set("startComputer", new Computer($dices));
            $this->session->set("Hand", new Hand($name, $dices));
            $this->session->set("computer", new Computer($dices));
            $this->session->set("round", 0);
        }
        $this->player = $_SESSION["Hand"];
        $this->computer = $_SESSION["computer"];
        $this->startPlayer = $_SESSION["startPlayer"];
        $this->startComputer = $_SESSION["startComputer"];
        $this->turn = $_SESSION["turn"] ?? null;
    }


    public function display()
    {
        print_r($this->player->name . "  Score: " . $this->player->total);
        print_r("<br>");
        print_r("<br>");
        print_r($this->computer->name . "  Score: " . $this->computer->total);

    }


    public function playerRoll()
    {
        $this->player->roll();
        if ($this->player->total == 0) {
            echo "player nuöö";
            $this->turn = $_SESSION["turn"] = 1;
        }


    }



    public function computerRoll()
    {
        $this->computer->compRoll();
        if ($this->computer->total == 0) {
            $this->turn = $_SESSION["turn"] = 2;
        } else {
            $this->setComputerTotal($this->computer->total);
        }
    }


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

    public function reset()
    {
        $_SESSION["round"] = 0;
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
        $this->session->destroy();
    }

    public function setPlayerTotal(int $sum)
    {
        $this->player->overallTotal += $sum;
        $this->start(1);





    }


    public function setComputerTotal(int $sum)
    {
        $this->computer->setTotal($sum);
        $this->start(2);
        echo " computer 2 " . $this->turn;
    }


    public function round()
    {
        $_SESSION["round"] += 1;
    }


    public function getRound()
    {
        return $_SESSION["round"];
    }


    public function start(int $number)
    {
        $this->session->set("turn", $number);
    }

    public function firstRoll()
    {
        $this->startPlayer->roll();
        $this->startComputer->compRoll();
    }
}
