<?php

//name space
namespace App\Controllers;

//usage package
use Core\Controller;
use Data\Repository\LikeRepository;
use Helper\ErrorMessage;
use Helper\ValidateData;


/**
 * controller for user Likes
 */
class LikeController extends Controller
{
    protected LikeRepository $like;
    public function __construct()
    {
        $this->like = new LikeRepository();
    }

    public function add()
    {
        // get data from input
        $data = $_REQUEST;
        // condition for is user log in 
        if (!isset($_SESSION['UserId'])) {
            ErrorMessage::message('please log in for like this product !!');
            header("Location: /single-page?id={$data['product_id']}");
        }

        // add user id to the data
        $data['user_id'] = $_SESSION['UserId'];


        //validate the value
        $userId = $data['user_id'];
        $productId = $data['product_id'];
        
        //is user like 
        $isLike = $this->like->isUserLike($userId, $productId);

        //condition for is user like the product?
        if ($isLike == "0" ) {
            $result = $this->like->createItem($data);
            ErrorMessage::message('you like this product !!');
        } else {
             $result = $this->like->deleteByUser($userId,$productId);
             ErrorMessage::message('you like remove from this product !!');
        }


        // result of progress
        if (!$result) {
            ErrorMessage::message('some things wrong !!!');
            header("Location: /single-page?id={$productId}");
        }
        header("Location: /single-page?id={$productId}");
    }
}
