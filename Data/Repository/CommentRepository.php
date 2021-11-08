<?php

//name space
namespace Data\Repository;

// usage package
use Data\Construct\CommentInterface;

class CommentRepository extends BaseRepository implements CommentInterface
{
    //table name from db
    protected $table = 'comment';

    public function getByProduct($productId)
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$this->table} where product_id= ?  ");

            $statement->execute([$productId]);


            return  $statement->fetchAll($this->pdo::FETCH_ASSOC);
        } catch (\Throwable $th) {

            header("Location: /single-page?id={$productId}");
        }
    }
    public function getByUser($productId)
    {
        // dd($productId);
        try {
            $statement = $this->pdo->prepare("SELECT * FROM  user AS u ,comment AS c WHERE c.product_id = $productId  and c.user_id = u.id");
            $statement->execute();

            return  $statement->fetchAll($this->pdo::FETCH_ASSOC);
        } catch (\Throwable $th) {

            dd('error');
        }
    }


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
}
