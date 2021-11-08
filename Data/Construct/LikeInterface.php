<?php

//name space
namespace Data\Construct;





interface LikeInterface
{
    // function for is user like this product?
    public function isUserLike($userId,$productId);
    
    //delete like by user id
    public function deleteByUser($userId,$productId);

    // function for get all likes by PRODUCT id  
    
    public function getByProduct($productId);

    // function for delete likes by product
    public function deleteByProduct($productId);


}
