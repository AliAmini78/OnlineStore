<?php 
// // requirement files 
require_once '../vendor/autoload.php';



//usage package
use Core\Application;


define( 'ROOT_DIR', dirname(__FILE__) );


//instance the main application class
$app = new Application();

// routes manage
require '../Routes/HomeRoutes.php';
require '../Routes/AdminRoutes.php';


// run the application
$app->run();