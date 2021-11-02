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
}