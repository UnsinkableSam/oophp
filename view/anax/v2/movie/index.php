<?php

$request = new \Anax\Request\Request();


$request->setGlobals();

$request->init();


$search = $request->getPost("search") ?? "";
$sql = "SELECT * FROM movie WHERE title LIKE  '%$search%' OR YEAR LIKE '%$search%'";
$res = $app->db->executeFetchAll($sql);




if ($request->getPost("delete")) {
    deleteMovie($request->getPost("delete"), $app);
}

function deleteMovie($id, $app)
{
    $movie = $id;
    $sql = "DELETE FROM movie WHERE id LIKE '%$movie%'";
    $res = $app->db->executeFetchAll($sql);
    $sql = "SELECT * FROM movie";
    $res = $app->db->executeFetchAll($sql);
}

$sql = "SELECT * FROM movie";
$res = $app->db->executeFetchAll($sql);


?>


        <form  method="POST">
            <input type="text" name="search" value="" placeholder="search">
        </form>
        <form action="movie/create" method="POST">
            <button type="submit" name="create"  value="<?php $res[0] ?>">Create </button>
        </form>
        <table style="width:100%">
  <tr>
    <th>id</th>
    <th>title</th>
    <th>length</th>
    <th>year</th>
    <th>plot</th>
    <th>image</th>

  </tr>
    <?php for ($i=0; $i < count($res); $i++) { ?>
  <tr>
    <th><?php echo $res[$i]->id ?></th>
    <th><?php echo $res[$i]->title ?></th>
    <th><?php echo $res[$i]->length ?></th>
    <th><?php echo $res[$i]->year ?></th>
    <th><?php echo $res[$i]->plot ?></th>
    <th> <img src="<?=$res[$i]->image;?>" style="width " /> </th>

    <th><form action="movie" method="POST">
        <button type="submit" name="delete" value="<?php echo $res[$i]->id?>">DEL</button>
    </form></th>
    <th><form action="movie/update" method="POST">
        <button type="submit" name="update" value="<?php echo $res[$i]->id?>">UPDATE</button>
    </form></th>
    <th><form action="movie/read" method="POST">
        <button type="submit" name="read" value="<?php  $res[$i]->id?>">READ</button>
     </form></th>
  </tr>
  
<?php } ?>
</table>
