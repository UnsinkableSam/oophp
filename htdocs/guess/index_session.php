<?php

namespace sapt17\Guess ;

/**
*  If $_SESSION not set then start a new one.
*/
if (!isset($_SESSION)) {
    session_name("GuessGame");
    session_start();
}


/**
* @var method  Form method.
* @var testing Set to get or post whatever you want.
*/

$method = "POST"; //
$testing = $_POST; //


/**
* $_GET number integer or default -1.
* $_GET tries integer or default 6.
* $_GET guess or default null.
*/

$number = $testing["number"] ?? -1;
$tries = $testing["tries"] ?? 6;
$guess = $testing["guess"] ?? null;




/**
* Exception for range not above 100 or below 1.
*/

if ($guess < 1 && $guess != null || $guess > 100) {
    throw new RangeException("Guess can't be above 100 or below 1");
}



/**
* variables to make sure we get int from the $_GET on both tries / number.
*/

$intTries = (int)$tries;
$intNumber = (int)$number;



/**
* If $_SESSION is set, create a new game in $_SESSION["game"].
*/

if (!isset($_SESSION["game"])) {
    $_SESSION["game"] = new Guess($intNumber, $intTries);
}

/**
* @var game holding $_SESSION["game"]
*/
$game = $_SESSION["game"];




/**
* This resets the game number and tries. Also destroy session.
*/

if (isset($testing['Doreset'])) {
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();
    $game = $_SESSION["game"] = new Guess(-1, 6);
}



/**
* This is were we make a guess with the GET $guess variable.
*/

if (isset($testing["doGuess"])) {
    $game->makeGuess($guess);
}

/**
* Cheat button which shows the number ur trying to guess.
*/

if (isset($testing["doCheat"])) {
    $game->number();
}
