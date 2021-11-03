<?php 

//name space
namespace Data\Repository;

//usage package
use Data\Construct\UserInterface;
use Helper\PasswordOption;
class UserRepository extends BaseRepository implements UserInterface
{
    protected $table = "user";

    // THE SUCCESS REDIRECT ROUT ABOUT USER  
    public $SuccessesRedirectRout =  "/login";


    // THE FAILED REDIRECT ROUT ABOUT USER  
    public $FailedRedirectRout =  "/register";


    
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
            header("Location: /loginGET.php");
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
            header("Location: /loginGET.php");
            die;
        }
        return $result;
    }
}