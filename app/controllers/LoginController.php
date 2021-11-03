<?php

//name space
namespace App\Controllers;


//usage package
use Core\Controller;
use Data\Repository\UserRepository;
use Helper\SessionManager;
use Helper\ValidateData;
use Helper\ErrorMessage;

/**
 * log in controller
 */
class LoginController extends Controller
{

    //controller index page
    public function index()
    {
        $params = [
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];
        $this->render('login', $params);
    }

    public function login()
    {


        //get variables from input
        $data = $_REQUEST;
        $email =  $data['email'];
        $password = $data['password'];


        // validate data come from user
        $isValid = ValidateData::validateUserInput($data);




        // condition for is input valid
        if (!$isValid) {
            $this->render('login', $data);
            return;
        }

        // find user by email 
        $user = new UserRepository();

        // is user exist
        $result = $user->findUserByEmail($email);
        if ($result == false) {

            ErrorMessage::message('the email in wrong');
            header('Location:/login');
            return;
        }

        // validate password
        $HashPassword = $result['password'];
        $isLogin  = UserRepository::loginAccess($password, $HashPassword);

        if ($isLogin) {
            SessionManager::loginUserSession($result);
            header("Location: /Admin");
        }
    }

    public function logout()
    {
        // log out the user 
        SessionManager::userLogout();

        // make logout message
        ErrorMessage::message('you log out successfully!!');

        header('Location: /');

    }
}
