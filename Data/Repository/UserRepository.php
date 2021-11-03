<?php 

//name space
namespace Data\Repository;



class UserRepository extends BaseRepository
{
    protected $table = "user";

    // THE SUCCESS REDIRECT ROUT ABOUT USER  
    public $SuccessesRedirectRout =  "/login";


    // THE FAILED REDIRECT ROUT ABOUT USER  
    public $FailedRedirectRout =  "/register";
}