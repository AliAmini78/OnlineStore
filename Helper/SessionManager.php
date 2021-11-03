<?php 

//namespace
namespace Helper;



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
     * make login session function
     *
     * @return void
     */
    public static function loginUserSession($data){
        $_SESSION['user_name'] = $data['full_name'];
        $_SESSION['user_email'] = $data['email'];
        $_SESSION['is_login'] = true;
    }
}