<?php

//name space
namespace App\Controllers;


//usage package
use Core\Controller;
use Helper\ErrorMessage;
use Data\Repository\CategoryRepository;
use Helper\ValidateData;

/**
 * controller for manage categories
 */
class CategoryController extends Controller
{
    protected CategoryRepository $category; 

    public function __construct() {
        $this->category = new CategoryRepository();
    }
    public function index()
    {

        // get all category data from db
        $AllData =  $this->category->GetAllItems();


        //set all data for send to view
        $param=[
            "AllData" => $AllData,
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];

        $this->render('category', $param);
    }

    //GET -> CREATE category
    public function add(){

        $this->render('add-category');
    }


    //POST -> CREATE category
    public function addPost(){

        //get data
        $data = $_REQUEST ;

        //validate input data 
        $isValid = ValidateData::validateUserInput($data);
        if (!$isValid) {
            $this->render('add-category');
            return;
        }

        //CREATE category
        $result = $this->category->createItem($data);

        //redirect to login if the result was true
        if (!$result) {
            header('Location: /category');    
        }
        header('Location: /category');
        dd($isValid);
    }
}
