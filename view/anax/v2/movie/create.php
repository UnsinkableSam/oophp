<?php

$request = new \Anax\Request\Request();
$request->setGlobals();
$request->init();

$sql = "SELECT * FROM movie";
$res = $app->db->executeFetchAll($sql);


$id = end($res);
print_r($id->id);

$title = $request->getPost("title") ?? "";
$length = $request->getPost("length") ?? "";
$format = $request->getPost("format") ?? "";
$year = $request->getPost("year") ?? "";
$image = $request->getPost("image") ?? "";
$quality = $request->getPost("quality") ?? "";


if ($request->getPost("create")) {
    // "INSERT INTO movie ($id->id +1, $title, $length, $format, $image, $quality) VALUES (id, title, length, format, image, quality)";
    $sql = "INSERT INTO `movie` (`title`, `year`, `image`) VALUES ('$title', '$year', '$image' )";
    $res = $app->db->executeFetchAll($sql);
}



?>

<h1>Create</h1>
<form  method="post">
    <th>title</th>
        <input type="text" name="title" value="title">
        <br><br>
    <th>length</th>
        <input type="text" name="length" value="length">
        <br><br>
    <th>year</th>
        <input type="text" name="year" value="year">
        <br><br>
    <th>plot</th>
        <input type="text" name="plot" value="plot">
        <br><br>
    <th>image</th>
        <input type="text" name="image" value="image">
    <input type="submit" name="create" value="create">


</form>
