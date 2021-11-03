<?php 


//usage package
use App\Controllers\AdminController;
use App\Controllers\UserController;

// the instance controller classes


$AdminController = new AdminController();
$UserController = new UserController();

// HOME routes
$app->router->get('/Admin', [$AdminController, 'index']);



//User Management routes 
$app->router->get('/user-list', [$UserController,'index'] );
$app->router->get('/edit-user', [$UserController,'edit'] );
$app->router->post('/edit-user', [$UserController,'editPost'] );
$app->router->get('/delete-user', [$UserController,'delete'] );
