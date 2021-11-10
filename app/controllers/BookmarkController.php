<?php

//name space
namespace App\Controllers;


//usage package
use Core\Controller;
use Data\Repository\BookmarkRepository;
use Helper\ErrorMessage;

class BookmarkController extends Controller
{
    protected BookmarkRepository $bookmark;
    public function __construct()
    {
        $this->bookmark = new BookmarkRepository();
    }

    //POST -> CREATE  bookmark
    public function add()
    {
        // get data from input
        $data = $_REQUEST;
        // condition for is user log in 
        if (!isset($_SESSION['UserId'])) {
            ErrorMessage::message('please log in for bookmark this product !!');
            header("Location: /single-page?id={$data['product_id']}");
        }

        // add user id to the data
        $data['user_id'] = $_SESSION['UserId'];


        //validate the value
        $productId = $data['product_id'];
        $result = $this->bookmark->isUserLike($data);

        //condition for add bookmark or delete
        if ($result) {
            ErrorMessage::message(' you bookmark the product !!!');
            header("Location: /single-page?id={$productId}");
            return;
        }
        ErrorMessage::message('your book mark remove !!!');
        header("Location: /single-page?id={$productId}");
    }
}
