<?php
namespace sapt17\Blogg ;

$resultset = $app->session->get("resultset") ?? null; ?>
<pre><?= $sql ?>

<pre>
<?= print_r($resultset, true) ?>
</pre>
