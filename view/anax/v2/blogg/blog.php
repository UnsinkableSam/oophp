<?php
namespace sapt17\Blogg ;

$txtFilter = new TxtFilter();
require "header.php";
$resultset = $app->session->get("resultset") ?? null;
if (!$resultset) {
    return;
}


$app->db->connect();
$sql = <<<EOD
SELECT
*,
DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE type=?
ORDER BY published DESC
;
EOD;
$res = $app->db->executeFetchAll($sql, ["post"]);
$content = $res;
// print_r($content

?>


<article>

<?php foreach ($content as $row) : ?>
<section>
    <?php $filter =explode(",", $row->filter); ?>
    <td><a href="<?php echo $row->slug ?? "page?id=$row->id"; ?>"><?= $row->title ?></a></td>

        <p><i>Published <?= $txtFilter->parse($row->published_iso8601, $filter) ?> <i></p>
        <p> <?= $row->data ?> </p>
</section>
<?php endforeach; ?>



</article>
