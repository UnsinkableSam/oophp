<?php
namespace sapt17\Blogg ;

$txtFilter = new TxtFilter();
$resultset = $app->session->get("resultset") ?? null;
require "header.php";


    ?>
<article>
    <header>
        <h1><?= $txtFilter->parse($content->title, "bbcode") ?></h1>

    </header>
    <?= $txtFilter->parse($content->data, "bbcode") ?>
</article>
