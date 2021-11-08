<?php


// name space
namespace App\Controllers;

//usage package
use Core\Controller;
use Data\Repository\CommentRepository;
use Data\Repository\ProductRepository;
use Helper\ErrorMessage;
use Helper\PrepareData;

/**
 * home controller 
 */
class HomeController extends Controller
{
    protected ProductRepository $product;
    protected CommentRepository $comment;
    public function __construct() {
        $this->product = new ProductRepository();
        $this->comment= new CommentRepository();
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

        //recursive function
        $comments =  $this->comment->groupCommentsByParentComment($id);
        
        // dd($children);
        // params for send to view
        $param = [
            'product' => $product,
            'comments' => $comments,
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];

        $this->render('single-page' ,$param );
    }
}
