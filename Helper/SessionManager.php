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
        if (!isset($_SESSION['IsLogin'])||$_SESSION['IsLogin'] == false) {
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
        $_SESSION['UserId'] = $data['id'];
        $_SESSION['UserName'] = $data['full_name'];
        $_SESSION['UserEmail'] = $data['email'];
        $_SESSION['IsLogin'] = true;
    }

    /**
     * clear user session for logout
     *
     * @return redirect
     */
    public static function userLogout(){
        $_SESSION['IsLogin'] = false;
        unset($_SESSION['UserId']);
        unset($_SESSION['UserName']);
        unset($_SESSION['UserEmail']);
    }
}