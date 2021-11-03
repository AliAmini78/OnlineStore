<?php 

//name space
namespace App\Controllers;

//usage package
use Core\Controller;
use Helper\SessionManager;
class AdminController extends Controller
{
    public function __construct()
    {
        
    }


    public function index()
    {
        SessionManager::validUserLogin();
        $this->render('dashboard');
    }
    
}