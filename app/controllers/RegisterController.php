<?php

//name space
namespace App\Controllers;

// dd(__dir__);
//requirement files


//usage package

use App\models\User;
use Core\Controller;
use Core\Request;
use Helper\ValidateData;
use Helper\PasswordOption;
use Data\Repository\UserRepository;
use Helper\ErrorMessage;

/**
 * register controller 
 */
class RegisterController extends Controller
{

    // controller index page
    public function index()
    {
        $params=[
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];
        $this->render('register' ,$params);
    }


    //post method 
    public function addUser()
    {

        //instance UserRepository
        $user = new UserRepository();

        //get data from input
        $data = $_REQUEST; //$request->getBody();


        //variables
        $password = $data['password'];
        $ConfirmPassword = $data['confirm_password'];
        $email = $data['email'];
        unset($data['confirm_password']);


        //validate that the user is exist or not
        $IsUserExist = $user->findUserByEmail($email);        
        if ($IsUserExist != false) {
            ErrorMessage::message('this user exist !!');
            header('Location: /register');
            die;
        }
      


        // validate data come from user
        $isValid = ValidateData::validateUserInput($data);
        $isPasswordConfirm = PasswordOption::checkPasswordConfirm($password, $ConfirmPassword);

        if (!$isValid || !$isPasswordConfirm) {
            $this->render('register', $data);
            return;
        }


        //hash the password
        $data['password'] = PasswordOption::hashPassword($password);




        //CREATE USER 
        $result = $user->createItem($data);

        //redirect to login if the result was true
        if (!$result) {
            header('Location: /register');    
        }
        header('Location: /login');
    }
}
