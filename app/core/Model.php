<?php 

namespace App\Core;

use PDO;

class Model
{
    protected $connection;
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=alpha", 'alpha', 'alpha',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $this->connection->exec("SET NAMES UTF8");
        } catch (PDOException $error) {
            echo $error->getMessage();    
        }
    }
    public function query($query)
    {
      return $this->connection->query($query);
    }
    public function findMany($query)
    {
        $customQuery = $this->query($query);
        return $customQuery->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findOne($query)
    {
        $customQuery = $this->query($query);
        return $customQuery->fetch(PDO::FETCH_ASSOC);
    }
    public function prepare($prdstmt)
    {
        return $this->connection->prepare($prdstmt);
    }
    public function insertData($query)
    {
        return $this->prepare($query);
    }
    public function counter($query)
    {
        $query = $this->query($query);
        return $query->rowCount();
    }
    public function executer($query)
    {
       return $query->execute();
    }
}
