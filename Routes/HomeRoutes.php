<?php 
// requirement files 
require_once '../vendor/autoload.php';

//usage package
use App\Controllers\HomeController;


$HomeController = new HomeController();



$app->router->get('/', [$HomeController, 'index']);
