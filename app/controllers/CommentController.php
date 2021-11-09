<?php 
//name space
namespace App\Controllers; 

//usage package
use Core\Controller;
use Data\Repository\CommentRepository;
use Helper\ValidateData;
use Helper\ErrorMessage;

class CommentController  extends Controller
{
    protected CommentRepository $comment;

    public function __construct() {
        $this->comment = new CommentRepository();    
    }


    // POST -> CREATE comment
    public function add()
    {
        // get data from input
        $data = $_REQUEST;
        
        // condition for is user log in 
        if (!isset($_SESSION['UserId'])) {
            ErrorMessage::message('please log in for comment !!');
            header("Location: /single-page?id={$data['product_id']}");   
        }

        // add user did to the data
        $data['user_id'] = $_SESSION['UserId'];

         //validate input data 
         $isValid = ValidateData::validateUserInput($data);
         if (!$isValid) {
             header("Location: /single-page?id={$data['product_id']}");
             return;
         }
 
         //CREATE category
         $result = $this->comment->createItem($data);
 
        
         // the redirect condition for exact route
         if (!$result) {
             ErrorMessage::message('comment not added added !!');
             header("Location: /single-page?id={$data['product_id']}");    
            }
            ErrorMessage::message('comment successfully added !!');
         header("Location: /single-page?id={$data['product_id']}");
    }
}