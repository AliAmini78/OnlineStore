<?php


//name space
namespace Data\Repository;

//usage package
use Data\Construct\BaseInterface;
use Core\Database;
use Helper\PrepareData;
use Helper\ValidateData;
use pdo;

class BaseRepository extends Database  implements BaseInterface
{

    // function for add item in database
    public function createItem(array $data)
    {

        // prepare input data for insert to db 
        $PrepareData = PrepareData::insertToDb($data);

        // try to insert data in db
        try {

            $statement = $this->pdo->prepare("insert into {$this->table} ({$PrepareData['fields']}) values ({$PrepareData['params']})");
            $statement->execute($data);
            return;
        } catch (\Throwable $th) {
            header("Location: {$this->FailedRedirectRout}");
        }
    }



    // function for edit item in database
    public function editItem($id, $data)
    {
        
        // prepare input data for insert to db 
        $PrepareData = PrepareData::updateToDb($data);
        
        // try to update data in db
        try {
            $statement = $this->pdo->prepare("UPDATE {$this->table} SET {$PrepareData} WHERE id=$id");
            $statement->execute($data);
            return true;
            
        } catch (\Throwable $th) {
            return false;
        }
    }

    //function for delete item in database 
    public function deleteItem($id)
    {
        // try to update data in db
        try {
            $statement = $this->pdo->prepare("DELETE FROM {$this->table}  WHERE id=:id");
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            return true;
            
        } catch (\Throwable $th) {
            return false;
        }
    }

    //function for get one item from database
    public function getItem($id)
    {
        try {
            
            $statement = $this->pdo->prepare("SELECT * FROM {$this->table} where id= ? LIMIT 1");
            $statement->execute([$id]);
            return  $statement->fetch($this->pdo::FETCH_ASSOC);
        } catch (\Throwable $th) {
            header("Location: /login");
        }
    }

    //function for get all item from database 
    public function getAllItems()
    {

        // try to get all data in db
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            header("Location: {$this->FailedRedirectRout}");
        }
    }
}
