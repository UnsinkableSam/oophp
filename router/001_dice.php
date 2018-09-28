<?php
namespace sapt17\Dice ;

$app->router->any(["GET", "POST"], "dice/hand", function () use ($app) {






    $app->view->add("anax/v2/dice/dice");


    return $app->page->render([
        "title" => "Gissa spelet session",
    ]);

});



$app->router->any(["GET", "POST"], "dice/testing", function () use ($app) {



    $app->view->add("anax/v2/dice/testing");


    return $app->page->render([
        "title" => "Gissa spelet session",
    ]);

});
