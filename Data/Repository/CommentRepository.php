<?php

//name space
namespace Data\Repository;

// usage package
use Data\Construct\CommentInterface;

class CommentRepository extends BaseRepository implements CommentInterface
{
    //table name from db
    protected $table = 'comment';

     
    /**
     * get comment of a single product
     *
     * @param [type] $productId
     * @return void
     */
    public function getByProduct($productId)
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$this->table} where product_id= ? ");

            $statement->execute([$productId]);


            return  $statement->fetchAll($this->pdo::FETCH_ASSOC);
        } catch (\Throwable $th) {

            header("Location: /single-page?id={$productId}");
        }
    }

    /**
     * get comment of a single product with parent & child grouping
     *
     * @param [type] $productId
     * @return void
     */
    public function groupCommentsByParentComment($productId)
    {


        try {
            $statement = $this->pdo->prepare(
                "SELECT * FROM   user
                RIGHT JOIN comment on  user.id = comment.user_id 
                WHERE comment.product_id = $productId "
            );
            
            $statement->execute();
            
            $result =  $statement->fetchAll($this->pdo::FETCH_ASSOC);
            $array =array();
            foreach ($result as $key => $value) {
                $array[$value['parent_comment']][]=$value;
            }
            return $array;
        } catch (\Throwable $th) {

            dd('error');
        }
    }

    /**
     * delete all comment of single product
     *
     * @param [type] $productId
     * @return void
     */
    public function deleteCommentsByProduct($productId){
        // try to update data in db
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
