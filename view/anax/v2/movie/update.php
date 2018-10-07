<?php

$request = new \Anax\Request\Request();
$request->setGlobals();
$request->init();

$postId = $request->getPost("update");

$sql = "SELECT * FROM movie WHERE id LIKE '%$postId%' ";
$res = $app->db->executeFetchAll($sql);


$title = $request->getPost("title") ?? $res[0]->title;
$length = $request->getPost("length") ?? 0;
$format = $request->getPost("format") ?? $res[0]->format;
$image = $request->getPost("image") ?? $res[0]->quality;
$quality = $request->getPost("quality") ?? $res[0]->quality;

if ($postId == "2") {
    echo "ok";
}

$id = $request->getPost("id") ;

if ($request->getPost("click")) {
    $sql = "UPDATE movie SET title = '$title', length = '$length', format = '$format', image = '$image', quality = '$quality' WHERE id LIKE '$id' ";
    // $sql = "UPDATE movie SET title = $title, length = $length, format = $format, image = $image, quality = $quality  WHERE id LIKE '$id' ";
    $res = $app->db->executeFetchAll($sql);

    $sql = "SELECT * FROM movie WHERE id LIKE '$id' ";
    $res = $app->db->executeFetchAll($sql);
}
// $sql = "SELECT * FROM movie WHERE title LIKE  '%$search%' OR YEAR LIKE '%$search%'";
//
// $sql = "SELECT * FROM movie WHERE id LIKE '$postId' ";
// $res = $app->db->executeFetchAll($sql);

print_r($res[0]->id);

?>

<h1>Update</h1>
<form   method="post">
     <p> title </p>
    <th><input type="text" name="title" value="<?php echo $res[0]->title ?>"> </th>
    <br>
    <p> id</p>
    <th><input type="text" name="id" value="<?php echo $res[0]->id ?>"> </th>
    <br>
    <p> length </p>
    <th><input type="text" name="length" value="<?php echo $res[0]->length ?>"> </th>
    <br>
    <p> format </p>
    <th><input type="text" name="format" value="<?php echo $res[0]->format ?>"> </th>
    <br>
    <p> image </p>
    <th><input type="text" name="image" value="<?php echo $res[0]->image ?>">  </th>
    <br>
    <p> quality </p>
    <th><input type="text" name="quality" value="<?php echo $res[0]->quality ?>">  </th>
    <br>
    <input type="submit" name="click" value="click">
</form>
