<?php

namespace Anax\View;

/**
 * Template file to render a view of get_index.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>


<!--  This is our form for guess, tries, number, reset and submit.-->



<form method="POST">
  Guess:<br>
  <input type="int" name="guess" value="<?php $guess?>">
  <br><br>
  <input type="hidden" name="tries" value="<?php echo $game->tries; ?>">
  <br><br>
  <input type="hidden" name="number" value="<?php echo $game->number; ?>">
  <br><br>
<?php if (!isset($game->message)) {
    echo '<input type="submit" name="doGuess" value="Submit">';
    echo '<input type="submit" name="doCheat" value="Cheat">';
}
?>
  <input type="submit" name="Doreset" value="Reset">
</form>




<?php
/**
* This is were we display $game->number if $_POST is set.
*/

if (isset($_POST["doCheat"])) {
    echo "<h2>" . $game->number . "</h2>";
}

/**
* This is were we display @var message if  @var game->message is set.
*/

if (isset($game->message)) {
    echo "<h2>" . $game->message . "</h2>";
}


/**
* This is were we display @var game->value if @var game->value is set.
*/

if (isset($game->value)) {
    echo "<h2>" . $game->value . "</h2>";
}


/**
* This is were we make a guess with the GET $guess variable.
*/

if (isset($_POST["doGuess"])) {
    if (!isset($game->message)) {
        $game->makeGuess($guess);
    }
}
