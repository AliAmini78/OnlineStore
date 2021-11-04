<?php

//namespace
namespace Core;

//usage package
use pdo;

/**
 * Application database class
 */
class Database
{
    // database type name 
    private $DbType = 'mysql';
    // database name
    private $DbName = "onlinestoredb";
    // database host
    private $host = 'localhost';
    // database username 
    private $UserName = 'root';
    // database password
    private $Password = '';



    public function __construct()
    {
        // connect to db
        try {
            $this->pdo = new PDO("{$this->DbType}:host={$this->host};dbname={$this->DbName}",$this->UserName,$this->Password);
        } catch (\Throwable $th) {
            echo 'the problem is from data base !!! ';
        }
    }
}
