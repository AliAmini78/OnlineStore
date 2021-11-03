<?php

//name space
namespace Data\Construct;


/**
 * base app interface 
 */
interface BaseInterface
{
    // function for add item in database 
    public function Create(array $data);

    // function for edit item in database
    public function Edit();

    //function for delete item in database 
    public function Delete();

    //function for get one item from database
    public function GetItem();

    //function for get all item from database 
    public function GetAllItems();
}
