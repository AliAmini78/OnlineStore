<?php

//name space
namespace Helper;


//usage package
use Helper\SessionManager;

/**
 * class for validate any data in app
 */
class ValidateData
{

    /**
     * validation input data from use function
     *
     * @param array $data = all data for validate
     * @return bool = the data is valid
     */
    public static function validateUserInput($data)
    {
        $IsValid = true;

        foreach($data as $key=>$value){
            if ($value == null) {
                SessionManager::MakeSession($key,"please fill this filed");
                $IsValid = false;
            }
        }
        return $IsValid;
    }

    public static function checkPasswordConfirm($password , $confirmPassword)
    {
        return $password === $confirmPassword;
    }

    
}