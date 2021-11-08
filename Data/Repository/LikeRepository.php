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
    protected $table = 'likes';

    /**
     * function for is user like this product?
     *
     * @param [type] $userId = user id
     * @param [type] $productId = product id
     * @return boolean
     */
    public function isUserLike($userId, $productId)
    {
        try {
            $statement = $this->pdo->prepare(
                "SELECT COUNT(user_id)
                FROM {$this->table}
                WHERE user_id = {$userId} AND product_id = {$productId}"
            );
            $statement->execute();
            return  $statement->fetch($this->pdo::FETCH_ASSOC | $this->pdo::FETCH_COLUMN);
        } catch (\Throwable $th) {
            return false;
        }
    }


     /**
     * function for  delete like by user id
     *
     * @param [type] $userId = user id
     * @param [type] $productId = product id
     * @return boolean
     */
    public function deleteByUser($userId,$productId)
    {
        // try to update data in db
        try {
            $statement = $this->pdo->prepare("DELETE FROM {$this->table}  WHERE product_id = :product_id AND user_id = :user_id");
            $statement->bindParam(':product_id', $productId);
            $statement->bindParam(':user_id', $userId);
            $statement->execute();
            return true;
            
        } catch (\Throwable $th) {
            return false;
        }
    }
}
