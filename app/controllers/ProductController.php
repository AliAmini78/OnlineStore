<?php

//name space
namespace App\Controllers;


//usage package
use Core\Controller;
use Data\Repository\BookmarkRepository;
use Data\Repository\CategoryRepository;
use Data\Repository\CommentRepository;
use Data\Repository\LikeRepository;
use Data\Repository\ProductRepository;
use Data\Repository\ScoreRepository;
use Helper\ErrorMessage;
use Helper\ValidateData;
use Helper\FileUpload;

class ProductController extends Controller
{

    protected ProductRepository $product;
    protected CategoryRepository $category;
    protected CommentRepository $comment;
    protected LikeRepository $like;
    protected BookmarkRepository $bookmark;
    protected ScoreRepository $score;

    public function __construct()
    {
        $this->product = new ProductRepository();
        $this->category = new CategoryRepository();
        $this->comment = new CommentRepository();
        $this->like = new LikeRepository();
        $this->bookmark = new BookmarkRepository();
        $this->score = new ScoreRepository();
    }


    public function index()
    {
        // get all category data from db
        $AllData =  $this->product->GetAllItems();


        //set all data for send to view
        $param = [
            "AllData" => $AllData,
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];

        $this->render('product', $param);
    }

    // GET -> CREATE product
    public function add()
    {
        //get all categories
        $category = $this->category->getAllItems();

        // prepare params for send to view
        $param = [
            'category' => $category,
        ];
        $this->render('add-product', $param);
    }

    //POST -> CREATE product
    public function addPost()
    {
        //get data
        $data = $_REQUEST;
        $pic = $_FILES['pic'];

        //validate input data 
        $isValid = ValidateData::validateUserInput($data);
        if (!$isValid) {
            $this->add();
            return;
        }


        // upload img 
        $ImgPath = FileUpload::ImgUploader($pic);

        // set img upload path to our data for going to db 
        $data['pic'] = $ImgPath;
        
        //insert data to db
        $result = $this->product->createItem($data);

        // the redirect condition for exact route
        if (!$result) {
            ErrorMessage::message('product successfully added !!');
            header('Location: /product');
        }
        header('Location: /product');
    }


    // GET -> EDIT product  
    public function edit()
    {
        //get value from header for get the item
        $id = $_GET['id'];

        // find item from db
        $data = $this->product->getItem($id);

        //get all categories
        $category = $this->category->getAllItems();

        //prepare params for send to view
        $param = [
            'data' => $data,
            'category' => $category,
        ];

        // render view whit param
        $this->render('edit-product', $param);
    }

    // POST -> EDIT  product
    public function editPost()
    {

        //get data
        $data = $_REQUEST;
        $id = $data['id'];
        unset($data['id']);

        //get current item for delete the pic
        $currentItem = $this->product->getItem($id);

        //validate input data 
        $isValid = ValidateData::validateUserInput($data);
        if (!$isValid) {
            $category = $this->category->getAllItems();
            $param = [
                'category' => $category,
            ];
            $this->render('add-product', $param);
            return;
        }

        //validation data 
        $prevPicUrl = $currentItem['pic'];
        $File = $_FILES['pic'];
        $ImgPath = $prevPicUrl;

        // new pic select functions 
        $Pic = FileUpload::ExistFile($File);


        //condition for is user set new pic ??
        if ($Pic != null) {
            FileUpload::DeleteFile($prevPicUrl);
            $ImgPath =FileUpload::ImgUploader($Pic);
        }


        // set img upload path to our data for going to db 
        $data['pic'] = $ImgPath;

        //insert data to db
        $result = $this->product->editItem($id,$data);

        // the redirect condition for exact route
        if (!$result) {
            ErrorMessage::message('product successfully added !!');
            header('Location: /product');
        }
        header('Location: /product');
    }


    //GET -> DELETE product 
    public function delete()
    {
        // get id from header
        $id = $_GET['id'];

        //get current item for access to pic path for delete
        $item = $this->product->getItem($id);


        //the current item pic path for delete
        $ImgPath = $item['pic'];
        //delete locally pic
        FileUpload::DeleteFile($ImgPath);

        //delete comments of products
        $CommentResult = $this->comment->deleteCommentsByProduct($id);

        // delete likes of product
        $likeResult = $this->like->deleteByProduct($id);
        
        // delete bookmarks of product
        $bookmarkResult = $this->bookmark->deleteByProduct($id);

        // delete Score of product
        $scoreResult = $this->score->deleteByProduct($id);
        
        //delete item
        $result = $this->product->deleteItem($id);


        if (!$result || !$CommentResult || !$likeResult || !$bookmarkResult || !$scoreResult) {
            header("Location:/product");
            ErrorMessage::message('some thing wrong !!');
            return;
        }
        ErrorMessage::message('product delete successfully !!');
        header("Location:/product");
    }
}
