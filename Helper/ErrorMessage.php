<?php 

//name space
namespace Helper;


/**
 * class for manage errors in app
 */
class ErrorMessage
{

    /**
     * input requirement error function
     *
     * @param [type] $InputName
     * @return string = error
     */
    public static function requireErrorMessages($InputName)
    {
       
        $Error = null;
        if (isset($_SESSION[$InputName])) {
            $Error = $_SESSION[$InputName];
            unset($_SESSION[$InputName]);
        }
        
        return $Error;
    }
    

    /**
     * Make error message function
     *
     * @param [string] $message
     * @return void
     */
    public static function message( $message){
        $_SESSION['Message']= $message;
        
    }
}