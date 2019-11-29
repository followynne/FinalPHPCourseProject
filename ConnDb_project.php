<?php
declare(strict_types=1);

class ConnDb {
        private $pdo; 
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo; 
    }
    
    public function getUser(PDO $pdo){
        $sth=$pdo->prepare("SELECT * FROM users WHERE name = :name AND pwd = :pwd");
        $sth->bindValue(':name', $_POST["username"]);
        $sth->bindValue(':pwd', $_POST["password"]);
        
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

    public function getAllArticol(PDO $pdo){
        $sth=$pdo->prepare("SELECT * FROM articles
         WHERE data = :data");
        $sth->bindValue(':data', $_POST["data"]);
        
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }
/*alternativa
public function getAllArticol(PDO $pdo){
    $sth=$pdo->prepare("SELECT * FROM articles");
  
   
   $sth->execute();
   $result = $sth->fetch();
   return $result;
}*/

    public function getArticolId(PDO $pdo){
        $sth=$pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $sth->bindValue(':id', $id);
        
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }