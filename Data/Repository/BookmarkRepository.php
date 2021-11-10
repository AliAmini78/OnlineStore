<?php
//name space 
namespace Data\Repository;

//usage package
use Data\Construct\BookmarkInterface;


class BookmarkRepository extends BaseRepository implements BookmarkInterface
{

    // the table name 
    protected $table = 'bookmark';


    /**
     * get book mark by user id and product id
     *
     * @param int $userId
     * @param int $productId
     * @return void
     */
    public function getByUserAndProduct($userId, $productId)
    {

        try {

            $statement = $this->pdo->prepare(
                "SELECT * 
                FROM {$this->table}
                where product_id = $productId 
                AND user_id = $userId
                "
            );
            $statement->execute();
            return $statement->fetch($this->pdo::FETCH_ASSOC);
        } catch (\Throwable $th) {
            dd('error');
        }
    }

    /**
     * is user bookmark current product ?
     *
     * @param [type] $userId
     * @param [type] $productId
     * @return boolean
     */
    public function isUserLike($data)
    {
        try {
            $statement = $this->pdo->prepare(
                "SELECT *  
                FROM {$this->table}
                where product_id = {$data['product_id']} 
                AND user_id = {$data['user_id']}
                "
            );
            $statement->execute();
            $result =  $statement->fetch($this->pdo::FETCH_ASSOC);
            if ($result) {
                $this->deleteItem($result['id']);
                return false;
            } else {
                $this->createItem($data);
                return true;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * delete bookmarks by product id
     *
     * @param [type] $productId
     * @return void
     */
    public function deleteByProduct($productId){
        try {
            $statement = $this->pdo->prepare("DELETE FROM {$this->table}  WHERE product_id = :product_id");
            $statement->bindParam(':product_id', $productId);
            $statement->execute();
            return true;
            
        } catch (\Throwable $th) {
            return false;
        }

    }
}
