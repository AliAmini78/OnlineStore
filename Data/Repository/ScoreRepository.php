<?php
//name space
namespace Data\Repository;


//usage package
use Data\Construct\ScoreInterface;

class ScoreRepository extends BaseRepository implements ScoreInterface
{
    protected $table = 'score';


    /**
     * is user scored the product ? and add or update the score of user  
     *
     * @param array $data
     * @return void
     */
    public function isUserScored( $data)
    {
        //set user id
        $userId = $data['user_id'];
        $productId = $data['product_id'];

        // try find is user like 
        try {
            $statement = $this->pdo->prepare(
                "SELECT COUNT(user_id) , id
                 FROM {$this->table}
                 WHERE user_id =$userId 
                 AND product_id = $productId
                "
            );
            $statement->execute();
            $result =  $statement->fetch($this->pdo::FETCH_ASSOC);
            if ($result["COUNT(user_id)"] == 0) {
                $this->createItem($data);
                return true;
            } else {
                $this->editItem($result['id'], $data);
                return false;
            }
        } catch (\Throwable $th) {
            header("Location: {$this->FailedRedirectRout}");
        }
    }

    /**
     * get all score by product
     *
     * @param [type] $productId
     * @return void
     */
    public function getByProduct($productId):array
    {
        // try to get all data in db
        try {
            $statement = $this->pdo->prepare(
                "SELECT * FROM {$this->table} 
                WHERE product_id = $productId"
            );
            $statement->execute();
            return $statement->fetchAll($this->pdo::FETCH_ASSOC );
        } catch (\Throwable $th) {
            header("Location: {$this->FailedRedirectRout}");
        }
    }
}
