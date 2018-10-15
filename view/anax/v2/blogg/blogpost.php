<?php
namespace sapt17\blogg;

require "header.php";
// require "../src/TextFilter/TxtFilter.php";
$txtFilter = new TxtFilter();


print_r($content->filter);
?>
<article>
    <header>
        <h1><?= $txtFilter->parse($content->title, $content->filter) ?></h1>
        <p><i>Published: <time datetime="<?= $txtFilter->parse($content->published_iso8601, $content->filter) ?>" pubdate><?= $txtFilter->parse($content->published, $content->filter) ?>
        </time></i></p>
    </header>
    <?= $txtFilter->parse($content->data, $content->filter) ?>
</article>
