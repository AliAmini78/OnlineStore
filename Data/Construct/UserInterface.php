<?php 

//name space
namespace Data\Construct;


interface UserInterface{
    public function findUserByEmail($email);
}