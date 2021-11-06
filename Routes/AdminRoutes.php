<?php 


//usage package
use App\Controllers\AdminController;
use App\Controllers\UserController;
use App\Controllers\CategoryController;
use App\Controllers\CommentController;
use App\Controllers\ProductController;

// the instance controller classes


$AdminController = new AdminController();
$UserController = new UserController();
$CategoryController = new CategoryController();
$ProductController = new ProductController();
$CommentController = new CommentController();

// HOME routes
$app->router->get('/Admin', [$AdminController, 'index']);



//User Management routes 
$app->router->get('/user-list', [$UserController,'index'] );
$app->router->get('/edit-user', [$UserController,'edit'] );
$app->router->post('/edit-user', [$UserController,'editPost'] );
$app->router->get('/delete-user', [$UserController,'delete'] );



//category routes
$app->router->get('/category', [$CategoryController,'index'] );
$app->router->get('/add-category', [$CategoryController,'add'] );
$app->router->post('/add-category', [$CategoryController,'addPost'] );
$app->router->get('/edit-category', [$CategoryController,'edit'] );
$app->router->post('/edit-category', [$CategoryController,'editPost'] );
$app->router->get('/delete-category', [$CategoryController,'delete'] );


//product routes
$app->router->get('/product' ,[$ProductController,'index']);
$app->router->get('/add-product' ,[$ProductController,'add']);
$app->router->post('/add-product' ,[$ProductController,'addPost']);
$app->router->get('/edit-product' ,[$ProductController,'edit']);
$app->router->post('/edit-product' ,[$ProductController,'editPost']);
$app->router->get('/delete-product', [$ProductController,'delete'] );


// COMMENT routes
$app->router->post('/comment' , [$CommentController ,'add']);
