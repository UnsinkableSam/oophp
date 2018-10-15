<?php
namespace sapt17\Blogg;

require "../src/TextFilter/TxtFilter.php";
$txtFilter = new TxtFilter(); // problem with slugify!!
/**
*  Route /htdocs/blog/edit
*/
$app->router->any(["GET", "POST"], "blog/edit", function () use ($app) {
    $title = "Edit";


    /* *
    * Connect to database
    */
    $id = $app->request->getGet("id");
    $app->db->connect();
    $sql = "SELECT * FROM content WHERE id = ?;";
    $res = $app->db->executeFetchAll($sql, [$id]);
    /**
    * adding database to template.
    */
    $app->page->add("anax/v2/blogg/edit", [
        "res" => $res,
        "id" => $id,
    ]);

    $form = [
        "contentTitle",
        "contentPath",
        "contentSlug",
        "contentData",
        "contentType",
        "contentFilter",
        "contentPublish",
        "contentId"
    ];


    /**
    * Render page
    */
    return $app->page->render([
        "title" => $title,
    ]);
});






$app->router->any(["GET", "POST"], "blog/create", function () use ($app, $txtFilter) {
    $title = "create";


    /* *
    * Connect to database
    */
    $app->db->connect();
    $sql = "SELECT * FROM content;";
    $res = $app->db->executeFetchAll($sql);


    if ($app->request->getPost("doCreate")) {
        $title = $app->request->getPost("contentTitle");
        $sql = "INSERT INTO content (title) VALUES (?);";
        $app->db->execute($sql, [$title]);
        $id = $app->db->lastInsertId();
        $app->request->setPost("id", $id);
    }


    /**
    * adding database to template.
    */
    $app->page->add("anax/v2/blogg/create", [
        "res" => $res,
    ]);


    /**
    * Render page
    */
    return $app->page->render([
        "title" => $title,
    ]);
});









$app->router->any(["GET", "POST"], "blog/show-all", function () use ($app, $txtFilter) {
    $title = "Show all content";


    $app->db->connect();
    if ($app->request->getPost("doSave")) {
        print_r("lasdasd");
        $title = $app->request->getPost("contentTitle");
        $path = $app->request->getPost("contentPath");
        $slug = $app->request->getPost("contentSlug");
        $data = $app->request->getPost("contentData");
        $type = $app->request->getPost("contentType");
        $filter = $app->request->getPost("contentFilter");
        $publish = $app->request->getPost("contentPublish");
        $id = $app->request->getPost("contentId");
        $txtFilter->slugify($slug);
        // $sql = "INSERT INTO content (title) VALUES (?);";
        $sql = "SELECT* FROM content WHERE slug=?";
        $duplicateSlug = $app->db->executeFetch($sql, [$slug]);
        if ($duplicateSlug) {
            $slug = $app->request->getPost("contentSlug") . $id;
            print_r("slug existed already and so has been changed to $slug");
        }

        $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=? WHERE id = ?;";
        $app->db->execute($sql, [$title, $path, $slug, $data, $type, $filter, $id]);
    }
    /* *
    * Connect to database
    */

    $sql = "SELECT * FROM content;";
    $res = $app->db->executeFetchAll($sql);
    $app->session->set("res", $res);


    /**
    * adding database to template.
    */
    $app->page->add("anax/v2/blogg/show-all", [
        "res" => $res,
    ]);


    /**
    * Render page
    */
    return $app->page->render([
        "title" => $title,
    ]);
});




$app->router->any(["GET", "POST"], "blog/admin", function () use ($app) {
    $title = "Admin";


    /* *
    * Connect to database
    */
    $app->db->connect();
    $sql = "SELECT * FROM content;";
    $res = $app->db->executeFetchAll($sql);
    $app->session->set("res", $res);



    /**
    * adding database to template.
    */
    $app->page->add("anax/v2/blogg/admin", [
        "res" => $res,
    ]);


    /**
    * Render page
    */
    return $app->page->render([
        "title" => $title,
    ]);
});


$app->router->any(["GET", "POST"], "blog/pages", function () use ($app, $txtFilter) {
    $title = "pages";


    /* *
    * Connect to database
    */
    $app->db->connect();
    $sql = <<<EOD
SELECT
        *,
        CASE
            WHEN (deleted <= NOW()) THEN "isDeleted"
            WHEN (published <= NOW()) THEN "isPublished"
            ELSE "notPublished"
        END AS status
    FROM content
    WHERE type=?
    ;
EOD;
            $resultset = $app->db->executeFetchAll($sql, ["page"]);
            $app->session->set("resultset", $resultset);




    /**
    * adding database to template.
    */
    $app->page->add("anax/v2/blogg/pages", [
        "resultset" => $resultset,
    ]);


    /**
    * Render page
    */
    return $app->page->render([
        "title" => $title,
    ]);
});





$app->router->any(["GET", "POST"], "blog/delete", function () use ($app) {
    $title = "delete";


    /* *
    * Connect to database
    */





    $contentId = $app->request->getPost("contentId") ?: $app->request->getPost("delId");
    if (!is_numeric($contentId)) {
        die("Not valid for content id.");
            print_r($app->request->getPost("delId"));
    }

    if ($app->request->getPost("doDelete")) {
        $app->db->connect();
        $contentId = $app->request->getPost("contentId");
        $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
        $app->db->execute($sql, [$contentId]);
    }
    $app->db->connect();
    $sql = "SELECT id, title FROM content WHERE id = ?;";
    $content = $app->db->executeFetch($sql, [$contentId]);


    /**
    * adding database to template.
    */
    $app->page->add("anax/v2/blogg/delete", [
        "content" => $content,
    ]);


    /**
    * Render page
    */
    return $app->page->render([
        "title" => $title,


    ]);
});




$app->router->any(["GET", "POST"], "blog/page", function () use ($app) {
    $title = "page";
    $id = $app->request->getGet("id");
    print_r($id);
    $app->db->connect();
    $sql = "SELECT * FROM content WHERE id = ?;";
    $res = $app->db->executeFetch($sql, [$id]) ;
    $content = $res;


    $app->page->add("anax/v2/blogg/page", [
        "content" => $content,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});





$app->router->any(["GET", "POST"], "blog/blog", function () use ($app) {
    $title = "blog";
    $app->page->add("anax/v2/blogg/blog", []);
    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "blog/blogpost", function () use ($app, $txtFilter) {
    $title = "blog";
    $id = $app->request->getGet("id");
    $app->db->connect();
    $world = "hello";
    $sql = <<<EOD
    SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
    FROM content
    WHERE id=?
    ORDER BY published DESC
    ;
EOD;

    $res = $app->db->executeFetch($sql, [$id]) ;
    $content = $res;
    // $data = [
    //     "content" => $content,
    //     "world" => $world
    // ];

    $app->page->add("anax/v2/blogg/blogpost", ["content" => $content,
    "world" => $world]);

    return $app->page->render([
        "title" => $title,
    ]);
});






$app->router->any(["GET", "POST"], "blog/reset", function () use ($app) {
    $title = "blog";



    $app->page->add("anax/v2/blogg/reset", [

    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

// nu-har-sommaren-kommit

$app->router->add("blog/{arg}", function ($arg) use ($app) {
    $title = $arg;
    $app->db->connect();
    $sql = <<<EOD
    SELECT
        *,
        DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
        DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
    FROM content
    WHERE
        slug = ?
        AND type = ?
        AND (deleted IS NULL OR deleted > NOW())
        AND published <= NOW()
    ;
EOD;
    $content = $app->db->executeFetch($sql, [$arg, "post"]);
        // print_r($content);
    if ($content) {
        $app->page->add("anax/v2/blogg/blogpost", [
        "content" => $content,]);

        return $app->page->render([
            "title" => $title,
            ]);
    }

});




$app->router->add("blog/{arg}", function ($arg) use ($app) {
    $title = $arg;
    $app->db->connect();
    $sql = <<<EOD
    SELECT
        *,
        DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
        DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
    FROM content
    WHERE
        path = ?
        AND type = ?
        AND (deleted IS NULL OR deleted > NOW())
        AND published <= NOW()
    ;
EOD;
    $content = $app->db->executeFetch($sql, [$arg, "page"]);
        // print_r($content);
    if ($content) {
        $app->page->add("anax/v2/blogg/page", [
        "content" => $content,]);






        return $app->page->render([
            "title" => $title,

            ]);
    }
});
