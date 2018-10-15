<?php
namespace sapt17\blogg;

require "header.php";
require "../src/TextFilter/TxtFilter.php";
$txtFilter = new TxtFilter();


// $id = $app->request->getGet("id");
// $app->db->connect();
// $sql = <<<EOD
// SELECT
// *,
// DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
// DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
// FROM content
// WHERE id=?
// ORDER BY published DESC
// ;
// EOD;
//
// $res = $app->db->executeFetch($sql, [$id]) ;
// $content = $res;

;

?>
<article>
    <header>
        <h1><?= $txtFilter->parse($content->title, $content->filter) ?></h1>
        <p><i>Published: <time datetime="<?= $txtFilter->parse($content->published_iso8601, $content->filter) ?>" pubdate><?= $txtFilter->parse($content->published, $content->filter) ?>
        </time></i></p>
    </header>
    <?= $txtFilter->parse($content->data, $content->filter) ?>
</article>
