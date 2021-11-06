<?php


// name space
namespace App\Controllers;

//usage package
use Core\Controller;
use Data\Repository\ProductRepository;
use Helper\ErrorMessage;

/**
 * home controller 
 */
class HomeController extends Controller
{
    protected ProductRepository $product;
    public function __construct() {
        $this->product = new ProductRepository();
    }

    //the index method
    public function index() 
    {
        $params = [
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];
        $this->render('home', $params);
        
    }    

    public function productList()
    {
        // get all product to show 
        $AllProducts = $this->product->getAllItems();
        $param = [
            "products" => $AllProducts
        ];
        $this->render('product-list' , $param);
    }

    public function singlePage()
    {
        // get product id from header
        $id = $_GET['id'];
        
        //get product for show single
        $product = $this->product->getItem($id);
        
        $param = [
            'product' => $product,
        ];

        $this->render('single-page' ,$param );
    }
}
