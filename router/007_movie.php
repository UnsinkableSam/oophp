<?php
/**
 * Show all movies.
 */
 $app->router->any(["GET", "POST"], "movie", function () use ($app) {
     $title = "Movie database | oophp";

     $app->db->connect();
     $sql = "SELECT * FROM movie;";
     $res = $app->db->executeFetchAll($sql);
     $app->page->add("anax/v2/movie/index", [
         "res" => $res,
     ]);


     return $app->page->render([
         "title" => $title,
     ]);
 });




    $app->router->any(["GET", "POST"], "movie/create", function () use ($app) {
        $title = "Movie database | oophp";

        $app->db->connect();
        $sql = "SELECT * FROM movie;";
        $res = $app->db->executeFetchAll($sql);
        $app->page->add("anax/v2/movie/create", [
        "res" => $res,
        ]);


        return $app->page->render([
         "title" => $title,
        ]);
    });




    $app->router->any(["GET", "POST"], "movie/update", function () use ($app) {
        $title = "Movie database | oophp";

        $app->db->connect();
        $sql = "SELECT * FROM movie;";
        $res = $app->db->executeFetchAll($sql);
        $app->page->add("anax/v2/movie/update", [
        "res" => $res,
        ]);


        return $app->page->render([
            "title" => $title,
        ]);
    });






    $app->router->any(["GET", "POST"], "movie/read", function () use ($app) {
        $title = "Movie database | oophp";

        $app->db->connect();
        $sql = "SELECT * FROM movie;";
        $res = $app->db->executeFetchAll($sql);
        $app->page->add("anax/v2/movie/read", [
            "res" => $res,
        ]);


        return $app->page->render([
            "title" => $title,
        ]);
    });
