<?php

namespace Sapt17\Dice;

/**
 * Show off a histogram.
 */



$rolls = $_GET["rolls"] ?? 6;

$dice = new DiceHistogram2();

for ($i = 0; $i < $rolls; $i++) {
    $dice->roll();
}

$histogram = new Histogram();
$histogram->injectData($dice);


?><h1>Display a histogram</h1>

<p><?= implode(", ", $histogram->getSerie()) ?></p>
<pre><?= $histogram->getAsText() ?></pre>
