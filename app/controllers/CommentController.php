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
        
        // add user id to the data
        $data['user_id'] = $_SESSION['user_id'];

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
             ErrorMessage::message('comment successfully added !!');
             header("Location: /single-page?id={$data['product_id']}");    
         }
         header("Location: /single-page?id={$data['product_id']}");
    }
}