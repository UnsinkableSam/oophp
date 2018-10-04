<?php

namespace sapt17\Dice;

require ANAX_INSTALL_PATH . "/vendor/autoload.php";
use PHPUnit\Framework\TestCase;


use Anax;

/**
 * Test cases for class Guess.
 */


 /**
  * Include autoloader.
  */



class DiceTest extends TestCase
{


    public function testComputer()
    {


        $computer = new Computer();
        $this->assertInstanceOf(Computer::class, $computer);
    }

    public function testGame()
    {
        $dig = new Anax\DI\DIMagic();
        $dig->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $app = $dig;
        $dig->set("app", $app);
        $game = new Game("player", 6, $app);
        $this->assertInstanceOf(Game::class, $game);
    }


    public function testDice()
    {

        $dig = new Anax\DI\DIMagic();
        $dig->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $app = $dig;
        $dig->set("app", $app);
        $dice = new Dice();


        $this->assertInstanceOf(Dice::class, $dice);

        $dice->random();
        $exp = $dice->lastRoll[count($dice->lastRoll) -1 ];
        $this->assertEquals($exp, $dice->getLastRoll());


    }


    public function testHand()
    {
        $hand = new Hand("bob", 6);



        $this->assertInstanceOf(Hand::class, $hand);
    }


    public function testHandName()
    {

        $hand = new Hand("bob", 6);

        $exp = "bob";
        $this->assertEquals($exp, $hand->name);
    }



    public function testPlayerHand()
    {
        $dig = new Anax\DI\DIMagic();
        $dig->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $app = $dig;
        $dig->set("app", $app);
        $game = new Game("Player", 1, $app);
        $game->playerRoll($app);
        while ($game->player->total != 0 && !isset($_SESSION["turn"])) {
            $game->playerRoll($app);
        }
        if ($game->player->total == 0) {
            $exp = 1;
            $this->assertEquals($exp, (int)$_SESSION["turn"]);
        }

    }






    public function testRandom()
    {
        $hand = new Hand("player", 1);
        $number = $hand->random();
        $exp = "int";
        $this->assertInternalType($exp, $number);
    }

    public function testGetHisto()
    {
        $hand = new Hand("player", 1);
        $number = $hand->getHistogramMax();
        $exp = 6;
        $this->assertEquals($exp, $number);
    }

    public function testSave()
    {
        $hand = new Hand("player", 1);
        $hand->roll();
        $hand->save();
        $this->assertEquals($hand->total, $hand->overallTotal);
    }
}
