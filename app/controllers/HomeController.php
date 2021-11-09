<?php


// name space
namespace App\Controllers;

//usage package
use Core\Controller;
use Data\Repository\CommentRepository;
use Data\Repository\LikeRepository;
use Data\Repository\ProductRepository;
use Helper\ErrorMessage;
use Helper\PrepareData;
use Helper\ValidateData;
/**
 * home controller 
 */
class HomeController extends Controller
{
    protected ProductRepository $product;
    protected CommentRepository $comment;
    protected LikeRepository $like;
    protected ValidateData $ScoreAvg;
    public function __construct() {
        $this->product = new ProductRepository();
        $this->comment= new CommentRepository();
        $this->like= new LikeRepository();
        $this->ScoreAvg = new ValidateData();
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

        // params foe send to view
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
        
        // get all likes for this product 
        $likesCount = $this->like->getByProduct($id);


        //avg score
        $score =$this->ScoreAvg->avgScore($id); 
        // dd($children);
        // params for send to view
        $param = [
            'product' => $product,
            'comments' => $comments,
            'likeCount' => $likesCount,
            'score' => $score,
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];

        $this->render('single-page' ,$param );
    }
}
