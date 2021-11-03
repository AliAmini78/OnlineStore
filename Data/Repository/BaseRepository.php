<?php 


//name space
namespace Data\Repository;

//usage package
use Data\Construct\BaseInterface;
use Core\Database;
use Helper\ValidateData;

class BaseRepository extends Database  implements BaseInterface
{

    // function for add item in database
    public function Create(array $data){        

        // prepare input data for insert to db 
        $PrepareData = ValidateData::makeDataForDb($data);
        //dd($data);
        
        // try to insert data in db
        try {
            
            $statement = $this->pdo->prepare("insert into {$this->table} ({$PrepareData['fields']}) values ({$PrepareData['params']})");
            $statement->execute($data);
            return ;
        } catch (\Throwable $th) {
            header("Location: {$this->FailedRedirectRout}");
        }
    }



    // function for edit item in database
    public function Edit(){
        return '';
    }

    //function for delete item in database 
    public function Delete(){
        return '';
    }

    //function for get one item from database
    public function GetItem(){
        return '';
    }

    //function for get all item from database 
    public function GetAllItems(){
        return '';
    }
}