<?php


// name space
namespace App\Controllers;

//usage package
use Core\Controller;
use Helper\ErrorMessage;
/**
 * home controller 
 */
class HomeController extends Controller
{

    //the index method
    public function index() 
    {
        $params = [
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];
        $this->render('home', $params);
        
    }    
}
