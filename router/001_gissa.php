<?php


/**
 * Route for guess game index_get.php.
 */
$app->router->get("gissa/get", function () use ($app) {
    // echo "Some debugging information";
    include __DIR__ . "/../htdocs/guess/index_get.php";
    //


    $data = [
        "title" => "Gissa spelet GET",
        "game" => $game,
        "guess" => $guess,
        "tries" => $tries
    ];

    $app->view->add("anax/v2/guess/get", $data);


    return $app->page->render([
        "title" => "hello",
    ]);

});



$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {
    // echo "Some debugging information";
    include __DIR__ . "/../htdocs/guess/index_post.php";
    //


    $data = [
        "title" => "Gissa spelet POST",
        "game" => $game,
        "guess" => $guess,
        "tries" => $tries,


    ];

    $app->view->add("anax/v2/guess/post", $data);


    return $app->page->render([
        "title" => "hello",
    ]);

});




$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    include __DIR__ . "/../htdocs/guess/index_session.php";

    $data = [
        "title" => "Gissa spelet POST",
        "game" => $game,
        "guess" => $guess,
        "tries" => $tries,


    ];

    $app->view->add("anax/v2/guess/session", $data);

    return $app->page->render([
        "title" => "Gissa spelet session",
    ]);

});
