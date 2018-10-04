<?php

/**
 * Sample configuration file for Anax webroot.
 */


/**
 * Define essential Anax paths, end with /
 */
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));
//define("ANAX_APP_PATH", ANAX_INSTALL_PATH);



/**
 * Include autoloader.
 */
require ANAX_INSTALL_PATH . "/vendor/autoload.php";



 /**
  * Include others.
  */
foreach (glob(__DIR__ . "/Mock/*.php") as $file) {
    require $file;
}





// Set development/production environment and error reporting
require ANAX_INSTALL_PATH . "/config/commons.php";



// // Add all framework services to $di
// $di = new Anax\DI\DIFactoryConfig();
// $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

// Enable to also use $app style to access services
$di = new Anax\DI\DIMagic();
$di->loadServices(ANAX_INSTALL_PATH . "/config/di");
$app = $di;
$di->set("app", $app);
