<?php
namespace sapt17\Dice ;

/**
* The view of dice game.
*/
$request = new \Anax\Request\Request();

# Set (reset) globals, useful in unit testing
# when not using $_GET, $_POST, $_SERVER
$request->setGlobals();

# Init the class by extracting url parts and
# route path.
$request->init();


$diceHundred = $diceHundred ?? new Game("Player", 1, $app);




if ($request->getPost("compRoll")) {
    $diceHundred->start(2, $app);
    $diceHundred->computerRoll($app);
}

if ($request->getPost("Roll")) {
    $diceHundred->playerRoll($app);
}


if ($request->getPost("save")) {
    $diceHundred->start(1, $app);
    $diceHundred->setPlayerTotal($diceHundred->player->total, $app);
    $diceHundred->player->total = 0;
}

if ($request->getPost("reset")) {
    $diceHundred->reset($app);
}

if ($request->getPost("start")) {
    $diceHundred->firstRoll();
    if ($diceHundred->startPlayer->total > $diceHundred->startComputer->total) {
        print_r("<h2>" . $diceHundred->startPlayer->name . " starts </h2>");
        $diceHundred->start(2, $app);
    } elseif ($diceHundred->startPlayer->total < $diceHundred->startComputer->total) {
        print_r("<h2>" . $diceHundred->startComputer->name . " starts </h2>");
        $diceHundred->start(1, $app);
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
    if ($app->session->get("turn") == 2 && $diceHundred->active != false) {
        echo '<input type="submit" name="Roll" value="Roll">';
        echo '<input type="submit" name="save" value="save">';
    } elseif ($app->session->get("turn") == 1 && $diceHundred->active != false) {
        echo '<input type="submit" name="compRoll" value="compRoll">';
    }








    $histogram = new Histogram();
    $histogram->injectData($diceHundred->player);

    $histogramComp = new Histogram();
    $histogramComp->injectData($diceHundred->computer);




    ?>
    <h1>Display a histogram player</h1>

    <p><?= $histogram->getSerie() ?></p>
    <pre><?= $histogram->getAsText() ?></pre>

    <h1> Display a histogram computer</h1>
    <p><?= $histogramComp->getSerie() ?></p>
    <pre><?= $histogramComp->getAsText() ?></pre>

        <?php } ?>
    <input type="submit" name="reset" value="reset">
</form>
