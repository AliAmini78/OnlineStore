<?php 
// requirement files 
require_once '../vendor/autoload.php';

//usage package
use App\Controllers\HomeController;
use App\Controllers\RegisterController;
use App\Controllers\LoginController;



// the instance controller classes
$HomeController = new HomeController();
$RegisterController = new RegisterController();
$LoginController = new LoginController();


// HOME routes
$app->router->get('/', [$HomeController, 'index']);


//register routes
$app->router->get('/register', [$RegisterController, 'index']);


//login routes
$app->router->get('/login', [$LoginController, 'index']);