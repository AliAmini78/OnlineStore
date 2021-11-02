<?php 

//name space
namespace App\Controllers;


//usage package
use Core\Controller;


/**
 * log in controller
 */
class LoginController extends Controller
{

    //controller index page
    public function index()
    {
        $this->render('login');
    }
}