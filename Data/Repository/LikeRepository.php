<?php 

//name space
namespace Data\Repository;

//usage package
use Data\Construct\LikeInterface;
use Data\Repository\BaseRepository;


/**
 * class for user likes
 */
class  LikeRepository extends BaseRepository implements LikeInterface
{
    //table name 
    protected $table = 'like';

    public function isUserLike($userId,$productId){
        return;
    }
    
}