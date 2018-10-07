<?php
$request = new \Anax\Request\Request();
$request->setGlobals();
$request->init();

$postId = $request->getPost("read");



$sql = "SELECT * FROM movie WHERE id LIKE '%$postId%' ";
$res = $app->db->executeFetchAll($sql);

?>



<th> <?php echo "id: ". $res[0]->id ?></th>
<br>
<br>
<th><?php echo "Titlte: ". $res[0]->title ?></th>
<br>
<br>
<th> <?php echo "length: ". $res[0]->length ?></th>
<br>
<br>
<th><?php echo "year: ". $res[0]->year ?></th>
<br>
<br>
<th><?php echo "plot: ". $res[0]->plot ?></th>
<br>
<br>
<th><?php echo "director: ". $res[0]->director ?></th>
<br>
<br>
