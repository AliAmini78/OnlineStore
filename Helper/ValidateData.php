<?php

//name space
namespace Helper;


//usage package
use Data\Repository\ScoreRepository;
use Helper\SessionManager;

/**
 * class for validate any data in app
 */
class ValidateData
{
    protected ScoreRepository $score;
    public function __construct() {
        $this->score = new ScoreRepository();
    }

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

    /**
     * valid is password and confirm password correct in register page?
     *
     * @param [type] $password
     * @param [type] $confirmPassword
     * @return void
     */
    public static function checkPasswordConfirm($password , $confirmPassword)
    {
        return $password === $confirmPassword;
    }


    /**
     * get avg od score of a product 
     *
     * @return void
     */
    public function avgScore($productId){
        $scores = $this->score->getByProduct($productId);
        $avg = 0;
        foreach ($scores as $item) {
            $avg += $item['value'];
        }
        if (count($scores) == 0)
            return $avg ;

        return $avg/ count($scores);
    }


    
}