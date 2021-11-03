<?php 

//name space
namespace Data\Repository;

//usage package
use Data\Construct\UserInterface;
use Helper\PasswordOption;
class UserRepository extends BaseRepository implements UserInterface
{
    //class table name
    protected $table = "user";



    
    /**
     * get one item with email from db
     *
     * @param string $email
     * @return [user] 
     */
    public function findUserByEmail($email)
    {
        try {
            
            $statement = $this->pdo->prepare("SELECT * FROM {$this->table} where email= ? LIMIT 1");
            $statement->execute([$email]);
            return  $statement->fetch($this->pdo::FETCH_ASSOC);
        } catch (\Throwable $th) {
            header("Location: /login");
        }
    }

    /**
     * access login function
     *
     * @param [string] $password
     * @param [string] $HashPassword
     * @return redirect
     */
    public static function loginAccess(string $password,string $HashPassword)
    {
        $result = PasswordOption::dehashPassword($password , $HashPassword);
        if (!$result) {
            $_SESSION['email'] = "ایمیل اشتباه میباشد";
            header("Location: /login");
            die;
        }
        return $result;
    }
}