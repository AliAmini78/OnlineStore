<?php

//name space
namespace App\Controllers;

// dd(__dir__);
//requirement files


//usage package
use Core\Controller;
use Core\Request;
use Helper\ValidateData;
use Helper\PasswordOption;
use Data\Repository\UserRepository;
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
        $data = $_REQUEST;//$request->getBody();


        //variables
        $password = $data['password'];
        $ConfirmPassword = $data['confirm_password'];
        unset($data['confirm_password']); 

       
        // validate data come from user
        $isValid = ValidateData::validateUserInput($data);
        $isPasswordConfirm = PasswordOption::checkPasswordConfirm($password, $ConfirmPassword);

        if (!$isValid || !$isPasswordConfirm) {
            $this->render('register', $data);
            return;
        }


        //hash the password
        $data['password'] = PasswordOption::hashPassword($password);

        //instance UserRepository
        $user = new UserRepository();


        //CREATE USER 
        $result = $user->create($data);

        //redirect to login if the result was true
        header('location: /login');
    }
}
