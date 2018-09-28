<?php

namespace Sapt17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
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
        $game = new Game("player", 6);
        $this->assertInstanceOf(Game::class, $game);
    }


    public function testDice()
    {
        $dice = new Dice();


        $this->assertInstanceOf(Dice::class, $dice);
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
}
