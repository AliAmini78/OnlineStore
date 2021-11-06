<?php 

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
$app->router->get('/product-list' , [$HomeController, 'productList']);


//register routes
$app->router->get('/register', [$RegisterController, 'index']);
$app->router->post('/register', [$RegisterController, 'addUser']);


//login routes
$app->router->get('/login', [$LoginController, 'index']);
$app->router->post('/login', [$LoginController, 'login']);
$app->router->get('/logout', [$LoginController, 'logout']);