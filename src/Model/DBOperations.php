<?php
declare(strict_types=1);
namespace SimpleMVC\Model;

use \PDO;
use \PDOException;

/**
 * This class opens connection with Microsoft SQL Server and interacts
 * for CRUD operations.
 */
class DBOperations {

  private $conn;
  private $idContainer;

  /**
   * The constructor gets a PDO Instance.
   */
  function __construct(PDO $pdo){
    $this->conn = $pdo;
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->conn->setAttribute (PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);
  }

  function checkLogin($data){
    $query = 'SELECT * FROM users where name = :user;';
    $q = $this->conn->prepare($query);
    $q->bindParam(':user', $data['user']);
    $q->execute();
    $result = $q->fetch();
    if (!$result){
      return "User doesn't exist.";
    } else {
        if (!password_verify($data['pwd'], $result['pwd'])){
          return "Access Denied";
        } else {
          return "Access Confirmed, Bzzzz, open the doors, disclose the secrets.";
        }
    }
  }

  function registerNewUser($data){
    $query = 'select * from user_data where name = :user;';
    $q = $this->conn->prepare($query);
    $q->bindParam(':user', $data['user']);
    $q->execute();
    $result = $q->fetch();
    if (!isset($result)){
      $pwd = password_hash($data['pwd'], PASSWORD_DEFAULT);
      $query = 'insert into users (name, pwd) values (:name, :pwd);';
      $q = $this->conn->prepare($query);
      $q->bindParam(':user', $data['user']);
      $q->bindParam(':pwd', $pwd);
      $q->execute();
      return "It went well... welcome to the family.";
    } else {
      return "I'm sorry, your user couldnt' be created.";
    }


  }

  function getArticles(){
    $query = 'SELECT * FROM articles;';
    $q = $this->conn->prepare($query);
    $q->execute();
    return $q->fetchAll();
  }

  function getArticle($seotitle){
    $query = 'SELECT * FROM articles where seotitle = :seotitle;';
    $q = $this->conn->prepare($query);
    $q->bindParam(':seotitle', $seotitle);
    $q->execute();
    return $q->fetch();
  }

  function test(){
    $query = 'SELECT * FROM users;';
    $q = $this->conn->prepare($query);
    $q->execute();
    return $res = $q->fetchAll();
    }
}
