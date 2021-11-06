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


        // the redirect condition for exact route
        if (!$result) {
            ErrorMessage::message('category successfully added !!');
            header('Location: /category');    
        }
        header('Location: /category');
    }



    //GET -> EDIT category
    public function edit()
    {
        //get value from header for get the item
        $id = $_GET['id'];

        // find item from db
        $data = $this->category->getItem($id);

        //prepare params for send to view
        $param=[
            'data' => $data
        ];

        // render view whit param
        $this->render('edit-category', $param);
    }

    //POST -> EDIT category
    public function editPost(){
        
        //get data from input
        $data = $_REQUEST;
        $id = $data['id'];
        unset($data['id']);


        // validate data come from user
        $isValid = ValidateData::validateUserInput($data);

        //condition for all filed not empty
        if (!$isValid) {
            header("Location:/edit-category?id={$id}");
            return;
        }

        //update user 
        $result = $this->category->editItem($id, $data);
        
        if (!$result) {
            header("Location:/edit-category?id={$id}");
            return;
        }
        ErrorMessage::message('category edit successfully !!');
        header("Location:/category");
        return;
    }


    //GET -> DELETE category

    public function delete()
    {

        // get id from header
        $id = $_GET['id'];


        //delete item
        $result = $this->category->deleteItem($id);

        
        if (!$result) {
            header("Location:/category");
            ErrorMessage::message('some thing wrong !!');
            return;
        }
        ErrorMessage::message('category delete successfully !!');
        header("Location:/category");
    }
}
