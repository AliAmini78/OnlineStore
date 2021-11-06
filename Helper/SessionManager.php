<?php 

//namespace
namespace Helper;

//usage package
use Helper\ErrorMessage;

/**
 * class for manage session 
 */
class SessionManager
{
    /**
     * make session function
     *
     * @param [type] $SessionName
     * @param [type] $SessionValue
     * @return void
     */
    public static function MakeSession($SessionName , $SessionValue)
    {
        $_SESSION[$SessionName] = $SessionValue;
    }

    /**
     * valid user session for access
     *
     * @return redirect
     */
    public static function validUserLogin(){
        if (!isset($_SESSION['is_login'])||$_SESSION['is_login'] == false) {
            ErrorMessage::message('please log in !!');
            header('Location: /login');
        }
    }


    /**
     * make login session function
     *
     * @return void
     */
    public static function loginUserSession($data){
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['user_name'] = $data['full_name'];
        $_SESSION['user_email'] = $data['email'];
        $_SESSION['is_login'] = true;
    }

    /**
     * clear user session for logout
     *
     * @return redirect
     */
    public static function userLogout(){
        $_SESSION['is_login'] = false;
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
    }
}