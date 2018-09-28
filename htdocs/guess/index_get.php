<?php

namespace sapt17\Guess ;

/**
* $_GET number integer or default -1.
* $_GET tries integer or default 6.
* $_GET guess or default null.
*/

$number = $_GET["number"] ?? -1;
$tries = $_GET["tries"] ?? 6;
$guess = $_GET["guess"] ?? null;





/**
* variables to make sure we get int from the $_GET on both tries / number.
*/

$intTries = (int)$tries;
$intNumber = (int)$number;



$game = new Guess($intNumber, $intTries);




/**
* This resets the game number and tries.
*/

if (isset($_GET['Doreset'])) {
    $game = new Guess(-1, 6);
}




/**
* This is were we make a guess with the GET $guess variable.
*/
if (isset($_GET["doGuess"])) {
    $game->makeGuess($guess);
}




/**
* Cheat button which shows the number ur trying to guess.
*/

if (isset($_GET["doCheat"])) {
    $game->number();
}
