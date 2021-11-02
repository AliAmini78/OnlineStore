<?php


//name space
namespace App\Controllers;

//usage package
use Core\Controller;


/**
 * register controller 
 */
class RegisterController extends Controller
{

    // controller index page
    public function index()
    {
        $this->render('register');
    }
}
