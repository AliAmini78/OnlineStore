<?php 

//name space
namespace App\models;


class User
{
    public string $full_name;
    public string $phone_number;
    public string $email;
    public string $address;
    public string $password;

    public function __construct()
    {
        
    }
}