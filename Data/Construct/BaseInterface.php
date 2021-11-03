<?php

//name space
namespace Data\Construct;


/**
 * base app interface 
 */
interface BaseInterface
{
    // function for add item in database 
    public function createItem(array $data);

    // function for edit item in database
    public function editItem(int $id , array $data);

    //function for delete item in database 
    public function deleteItem($id);

    //function for get one item from database
    public function getItem($id);

    //function for get all item from database 
    public function getAllItems();
}
