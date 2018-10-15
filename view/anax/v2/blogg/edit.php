<?php
namespace sapt17\Blogg ;

require "header.php";
$txtFilter = new TxtFilter();

$id = $id ?? $app->db->lastInsertId();

if ($app->request->getPost("doCreate")) {
    $title = $app->request->getPost("contentTitle");
    $sql = "INSERT INTO content (title) VALUES (?);";
    $app->db->execute($sql, [$title]);
    $id = $app->db->lastInsertId();
}


// if ($app->request->getPost("doSave")) {
//     $title = $app->request->getPost("contentTitle");
//     $path = $app->request->getPost("contentPath");
//     $slug = $app->request->getPost("contentSlug");
//     $data = $app->request->getPost("contentData");
//     $type = $app->request->getPost("contentType");
//     $filter = $app->request->getPost("contentFilter") ?? NULL;
//     $publish = $app->request->getPost("contentPublish");
//     // $sql = "INSERT INTO content (title) VALUES (?);";
//     $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=? WHERE id = ?;";
//     $app->db->execute($sql, [$id, $path, $slug, $type, $title, $data, $filter]);
// }


// $app->request->getPost("contentPath") ?? Null;
// $app->request->getPost("contentSlug") ?? Null;
// $app->request->getPost("contentType") ?? Null;
// $app->request->getPost("contentFilter") ?? Null;
// $app->request->getPost("contentData") ?? Null;
// // if ($request->getPost("doSave")) {
//     print_r($app->request->getpost(content));
// }
?>
<form action="show-all" method="post">
    <fieldset>
    <legend>Edit</legend>
    <input type="text" name="contentId" value="<?=  $id ?>"/>

    <p>
        <label>Title:<br>
        <input type="text" name="contentTitle" value=""/>
        </label>
    </p>

    <p>
        <label>Path:<br>
        <input type="text" name="contentPath" value=""/>
        </label>
    </p>

    <p>
        <label>Slug:<br>
        <input type="text" name="contentSlug" value=""/>
        </label>
    </p>

    <p>
        <label>Text:<br>
        <textarea name="contentData" value=""></textarea>
        </label>
     </p>

     <p>
         <label>Type:<br>
         <input type="text" name="contentType" value=""/>
         </label>
     </p>

     <p>

         <label>Filter:<br>
        <h1> Filter </h1>
         <input type="text" name="contentFilter" value=""/>
         </label>
     </p>

     <p>
         <label>Publish:<br>
         <input type="datetime" name="contentPublish" value=""/>
     </p>

    <p>
        <button type="submit" name="doSave" value="doSave"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
        <button type="reset"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button>
        <button type="submit" name="doDelete" value="doDelete"><i class="fa fa-trash-o" aria-hidden="true" ></i> Delete</button>
    </p>
    </fieldset>
</form>
