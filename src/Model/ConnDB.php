<?php

declare(strict_types=1);

namespace SimpleMVC\Model;

use \PDO;
use \PDOException;

class ConnDB
{
  private $pdo;
  private $read;

  public function __construct(PDO $pdo, ReadOnlyOpt $read)
  {
    $this->pdo = $pdo;
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);
    $this->read = $read;
  }

  function registerNewUser($data)
  {
    $query = 'select * from user_data where name = :user;';
    $q = $this->conn->prepare($query);
    $q->bindParam(':user', $data['user']);
    $q->execute();
    $result = $q->fetch();
    if (!isset($result)) {
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

  function checkUser($data){
    return $this->read->checkUser($data);
  }
}
