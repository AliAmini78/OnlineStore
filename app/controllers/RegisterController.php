<?php

//name space
namespace App\Controllers;

// dd(__dir__);
//requirement files


//usage package
use Core\Controller;
use Core\Request;
use Helper\ValidateData;

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


    //post method 
    public function addUser(Request $request)
    {
        //get data from input
        $data = $request->getBody();

        // validate data come from user
        $isValid = ValidateData::validateUserInput($data);
        $isPasswordConfirm = ValidateData::checkPasswordConfirm($data['password'],$data['confirm_password']);

        if (!$isValid || !$isPasswordConfirm) {
           
            $this->render('register' , $data);
            return;
        }
         
        //redirect to login if the result was true
        header('location: /login');
    }
}
