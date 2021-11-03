<?php 


//usage package
use App\Controllers\AdminController;

// the instance controller classes


$AdminController = new AdminController();


// HOME routes
$app->router->get('/Admin', [$AdminController, 'index']);
