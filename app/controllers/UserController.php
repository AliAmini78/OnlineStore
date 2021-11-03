<?php

//nam space
namespace app\Controllers;

//usage package

use App\models\User;
use Core\Controller;
use Data\Repository\UserRepository;
use Helper\ErrorMessage;
use Helper\ValidateData;

/**
 * controller for manage users
 */
class UserController extends Controller
{

    public function index()
    {
        //instance user repository class
        $Users = new UserRepository();

        // get all user data from db
        $AllData =  $Users->GetAllItems();

        //set all data for send to view
        $params = [
            "AllData" => $AllData,
            'message' => ErrorMessage::requireErrorMessages('Message'),
        ];

        $this->render('user-list', $params);
    }

    // GET - EDIT USER
    public function edit()
    {
        //get id from header 
        $UserId = $_GET['id'];


        //instance user class
        $user = new UserRepository();

        //get user for edit 
        $currentUser = $user->GetItem($UserId);


        //$user->editItem($UserId,$currentUser);

        // params foe send to view
        $params = [
            'data' => $currentUser,
        ];

        //rendering views
        $this->render('edit-user', $params);
    }

    // POST -> EDIT USER
    public function editPost()
    {
        //instance UserRepository
        $user = new UserRepository();

        //get data from input
        $data = $_REQUEST;
        $UserId = $data['id'];
        unset($data['id']);
        // validate data come from user
        $isValid = ValidateData::validateUserInput($data);

        //condition for all filed not empty
        if (!$isValid) {
            header("Location:/edit-user?id={$UserId}");
            return;
        }

        //update user 
        $result = $user->editItem($UserId, $data);
        
        if (!$result) {
            header("Location:/edit-user?id={$UserId}");
            return;
        }
        ErrorMessage::message('user edit successfully !!');
        header("Location:/user-list");
        return;
    }


    //GET -> DELETE USER
    public function delete()
    {
        //instance UserRepository
        $user = new UserRepository();

        //get data from input
        $userId = $_GET['id'];


        //delete item
        $result = $user->deleteItem($userId);


        if (!$result) {
            header("Location:/user-list");
            ErrorMessage::message('some thing wrong !!');
            return;
        }
        ErrorMessage::message('user delete successfully !!');
        header("Location:/user-list");
    }
}
