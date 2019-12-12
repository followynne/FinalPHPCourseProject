<?php

declare(strict_types=1);

namespace SimpleMVC\Model;

use \PDO;
use \PDOException;

class ConnDB extends ReadOnlyOpt
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);
  }

  function registerNewUser($data)
  {
    try {
      $query = 'select * from user_data where mail = :user;';
      $q = $this->conn->prepare($query);
      $q->bindParam(':user', $data['user']);
      $q->execute();
      $result = $q->fetch();
      if (!isset($result)) {
        $pwd = password_hash($data['pwd'], PASSWORD_DEFAULT);
        $query = 'insert into users (mail, pwd) values (:name, :pwd);';
        $q = $this->conn->prepare($query);
        $q->bindParam(':user', $data['mail']);
        $q->bindParam(':pwd', $pwd);
        $q->execute();
        return "It went well... welcome to the family.";
      } else {
        return "I'm sorry, your user couldnt' be created.";
      }
    } catch (PDOException $ex) {
      return "I'm sorry, your user couldnt' be created.";
    }
  }
}
