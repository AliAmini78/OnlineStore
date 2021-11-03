<?php 

//name space
namespace App\Controllers;

//usage package
use Core\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        //dd('asdads');
    }


    public function index()
    {
        $this->render('dashboard');
    }
    
}