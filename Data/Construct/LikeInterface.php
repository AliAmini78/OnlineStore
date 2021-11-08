<?php

//name space
namespace Data\Construct;





interface LikeInterface
{
    // function for is user like this product?
    public function isUserLike($userId,$productId);
    

    // function for get all likes by user id  
    
    //public function getByUser($userId);


}
