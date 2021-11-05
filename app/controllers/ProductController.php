<?php

//name space
namespace App\Controllers;


//usage package
use Core\Controller;
use Data\Repository\ProductRepository;
use Helper\ErrorMessage;

class ProductController extends Controller
{

    protected ProductRepository $product;

    public function __construct() {
        $this->product = new ProductRepository();
    }


    public function index()
    {
        // get all category data from db
        $AllData =  $this->product->GetAllItems();


        //set all data for send to view
        $param=[
            "AllData" => $AllData,
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];

        $this->render('product',$param);

    }
}