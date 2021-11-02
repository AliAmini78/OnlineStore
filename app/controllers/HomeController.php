<?php


// name space
namespace App\Controllers;

//usage package
use Core\Controller;

/**
 * home controller 
 */
class HomeController extends Controller
{

    //the index method
    public function index() 
    {
        

        $this->render('home');
        
    }    
}
