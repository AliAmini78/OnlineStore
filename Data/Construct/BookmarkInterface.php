<?php 
//name space
namespace Data\Construct;



interface BookmarkInterface{

    //get book mark by user and product
    public function getByUserAndProduct($userId, $productId); 

    // is user like this current product
    public function isUserLike($data);


    //delete book marks by product
    public function deleteByProduct($productId);
}