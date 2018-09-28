<?php
namespace sapt17\Dice ;

/**
* The view of dice game.
*/


$diceHundred = $diceHundred ?? new Game("Player", 0);



// if ($diceHundred->turn == 1) {
//     echo "<h2> Computer goes first </h2>";
// } elseif ($diceHundred->turn == 2) {
//     echo "<h2> Player goes first </h2>";
// }



if (isset($_POST["compRoll"])) {
    $diceHundred->start(2);
    $diceHundred->computerRoll();
}

if (isset($_POST["Roll"])) {
    $diceHundred->playerRoll();
}


if (isset($_POST["save"])) {
    $diceHundred->start(1);
    $diceHundred->setPlayerTotal($diceHundred->player->total);
    $diceHundred->player->total = 0;
}

if (isset($_POST["reset"])) {
    $diceHundred->reset();
}

if (isset($_POST["start"])) {
    $diceHundred->firstRoll();
    if ($diceHundred->startPlayer->total > $diceHundred->startComputer->total) {
        print_r("<h2>" . $diceHundred->startPlayer->name . " starts </h2>");
        $diceHundred->start(2);
    } elseif ($diceHundred->startPlayer->total < $diceHundred->startComputer->total) {
        print_r("<h2>" . $diceHundred->startComputer->name . " starts </h2>");
        $diceHundred->start(1);
    }
}


?>


<?php if (!isset($diceHundred->turn)) { ?>
    <h2> <?php echo $diceHundred->startPlayer->name . " " .  $diceHundred->startPlayer->total ?></h2>
    <p class="dice-utf8">
    <?php foreach ($diceHundred->startPlayer->dicesChecked as $value) : ?>
        <i class="dice-<?= $value->number ?>"></i>
    <?php endforeach; ?>
    </p>


    <h2> <?php echo $diceHundred->startComputer->name . " " .  $diceHundred->startComputer->total ?></h2>
    <p class="dice-utf8">
    <?php foreach ($diceHundred->startComputer->dicesChecked as $value) : ?>
        <i class="dice-<?= $value->number ?>"></i>
    <?php endforeach; ?>
    </p>

    <form method="post">
        <?php
                echo '<input type="submit" name="start" value="start">';
}
        ?>
    </form>


<?php $diceHundred->compare() ?>

<?php if (isset($diceHundred->turn)) { ?>


<?php echo "Total points: " . $diceHundred->player->overallTotal ?>
<h2> <?php echo$diceHundred->player->name . " " .  $diceHundred->player->total ?></h2>
<p class="dice-utf8">
<?php foreach ($diceHundred->player->dicesChecked as $value) : ?>
    <i class="dice-<?= $value->number ?>"></i>
<?php endforeach; ?>
</p>

<?php echo "Total points: " . $diceHundred->computer->overallTotal ?>
<h2> <?php echo$diceHundred->computer->name . " " .  $diceHundred->computer->total ?></h2>
<p class="dice-utf8">
<?php foreach ($diceHundred->computer->dicesChecked as $value) : ?>
    <i class="dice-<?= $value->number ?>"></i>
<?php endforeach; ?>
</p>

<form method="post">
    <?php
    if ($_SESSION["turn"] == 2 && $diceHundred->active != false) {
        echo '<input type="submit" name="Roll" value="Roll">';
        echo '<input type="submit" name="save" value="save">';
    } elseif ($_SESSION["turn"] == 1 && $diceHundred->active != false) {
        echo '<input type="submit" name="compRoll" value="compRoll">';
    }
    ?>



        <?php } ?>
    <input type="submit" name="reset" value="reset">
</form>
