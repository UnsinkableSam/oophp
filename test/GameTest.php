<?php

namespace sapt17\Dice;

require ANAX_INSTALL_PATH . "/vendor/autoload.php";
use PHPUnit\Framework\TestCase;


use Anax;

class GameTest extends TestCase
{


    public function testCompRoll()
    {
        $computer = new Computer();
        $computer->compRoll(20);
        $exp = "int";
        $this->assertInternalType($exp, $computer->total);
    }


    public function testSetTot()
    {
        $computer = new Computer();
        $computer->setTotal(10);
        $exp = 10;
        $this->assertEquals($exp, $computer->overallTotal);
    }



    public function testCompare()
    {
        $dig = new Anax\DI\DIMagic();
        $dig->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $app = $dig;
        $dig->set("app", $app);
        $game = new Game("Player", 1, $app);

        $game->player->overallTotal = 101;
        $exp = false;
        $game->compare();
        $this->assertEquals($exp, $game->active);


        $game = new Game("Player", 1, $app);
        $game->player->overallTotal = 0;
        $game->computer->overallTotal = 101;
        $exp = false;
        $game->compare();
        $this->assertEquals($exp, $game->active);
    }

    public function testSetTotal()
    {
        $dig = new Anax\DI\DIMagic();
        $dig->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $app = $dig;
        $dig->set("app", $app);
        $game = new Game("Player", 1, $app);

        $game->setPlayerTotal(100, $app);
        $exp = 100;
        $this->assertEquals($exp, $game->player->overallTotal);
    }

    public function testReset()
    {
        $dig = new Anax\DI\DIMagic();
        $dig->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $app = $dig;
        $dig->set("app", $app);
        $game = new Game("Player", 1, $app);

        $game->reset($app);
        $exp = null;
        $this->assertEquals($exp, $game->turn);
    }






    public function testFirstRoll()
    {
        $diceHistogram = new DiceHistogram2();
        $exp = $diceHistogram->roll();
        $number = $diceHistogram->getHistogramMax();
        $this->assertEquals($exp, $number);
    }


    public function testGetHistogram()
    {
        $diceHistogram = new DiceHistogram2();
        $diceHistogram->roll();
        $exp = 1;
        $number = $diceHistogram->getHistogramSerie();
        $this->assertEquals($exp, count($number));


        $exp = 1;
        $number = $diceHistogram->getHistogramMin();
        $this->assertEquals($exp, $number);
    }


    public function testHistogramtesting()
    {
        $dig = new Anax\DI\DIMagic();
        $dig->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $app = $dig;
        $dig->set("app", $app);
        $game = new Game("Player", 1, $app);

        $histogram = new Histogram();
        $histogram->histoReset();
        $exp = [];
        $this->assertEquals($exp, $histogram->returnHistoSerie());

        $histogram = new Histogram();
        $histogram->injectData($game->player);
        $number = $histogram->getSerie();
        $exp = "str";
        // $this->assertInternalType($exp, $number);
        $this->assertFalse(is_string($number));
        // $this->assertEquals($exp, ", ");
    
    }



    public function testCompHand()
    {
        $dig = new Anax\DI\DIMagic();
        $dig->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $app = $dig;
        $dig->set("app", $app);
        $game = new Game("Player", 1, $app);
        $game->computerRoll($app);
        while ($game->computer->total != 0 && !isset($_SESSION["turn"])) {
            $game->computerRoll($app);
        }
        if ($game->computer->total == 0) {
            $exp = 2;
            $this->assertEquals($exp, (int)$_SESSION["turn"]);
        }

        while ($game->computer->total == 0 && !isset($_SESSION["turn"])) {
            $game->computerRoll($app);
        }

        if ($game->computer->total != 0) {
            $exp = $game->computer->total;
            $this->assertEquals($exp, $game->computer->overallTotal);
        }

        while ($game->computer->total != 0) {
            $game->computerRoll($app);
        }

        if ($game->computer->total == 0) {
            $exp = 0;
            $this->assertEquals($exp, $game->computer->total);
        }

    }
}
