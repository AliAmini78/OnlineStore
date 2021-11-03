<?php

//name space
namespace App\Controllers;


//usage package
use Core\Controller;
use Data\Repository\UserRepository;
use Helper\SessionManager;

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

    public function login()
    {


        //get variables from input
        $email =  $_REQUEST['email'];
        $password = $_REQUEST['password'];


        // find user by email 
        $user = new UserRepository();


        // validate password
        $result = $user->findUserByEmail($email);
        
        $HashPassword = $result['password'];
        $isLogin  = UserRepository::loginAccess($password, $HashPassword);

        if ($isLogin) {
            SessionManager::loginUserSession($result);
            header("Location: /Admin");
        }
    }
}
