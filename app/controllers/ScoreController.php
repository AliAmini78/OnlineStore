<?php
//name space 
namespace App\Controllers;

//usage package
use Core\Controller;
use Data\Repository\ScoreRepository;
use Helper\ErrorMessage;

class ScoreController extends Controller
{
    protected ScoreRepository $score;
    public function __construct() {
        $this->score = new ScoreRepository();
    }

    // POST -> CREATE score
    public function add()
    {
        // get data from input
        $data = $_REQUEST;
        // condition for is user log in 
        if (!isset($_SESSION['UserId'])) {
            ErrorMessage::message('please log in for score this product !!');
            header("Location: /single-page?id={$data['product_id']}");
        }

        // add user id to the data
        $data['user_id'] = $_SESSION['UserId'];

        //validate the value
        $userId = $data['user_id'];
        $productId = $data['product_id'];

        //add or update score
        $result= $this->score->isUserScored($data);

        if ($result) {
            ErrorMessage::message('your score added !!');
            header("Location: /single-page?id={$data['product_id']}");
        }
        ErrorMessage::message('your score updated !!');
        header("Location: /single-page?id={$data['product_id']}");


    }
}
