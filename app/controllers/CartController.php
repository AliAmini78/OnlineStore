<?php 

//name space
namespace App\Controllers;

//usage package

use Core\Controller;
use Data\Repository\ProductRepository;
use Helper\ErrorMessage;
use Helper\SessionManager;
use Helper\PrepareData;

class CartController extends Controller
{
    protected ProductRepository $product;

    public function __construct() {
        $this->product = new ProductRepository();
    }

    public function index(){

        $this->render('cart');
    }

    // add product to session 
    public function addToProductCart()
    {
        //set product id
        $productId = $_GET['product_id'];

        // get product by product id 
        $product = $this->product->getItem($productId);
        
        // add product to session
        PrepareData::addDataForCartSession($product);


        // success redirect
        ErrorMessage::message('your product added !!');
        header('Location: /cart');
        
    }
}