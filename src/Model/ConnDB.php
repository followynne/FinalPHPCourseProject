<?php

declare(strict_types=1);

namespace SimpleMVC\Model;

use \PDO;
use \PDOException;

class ConnDB extends ReadOnlyOpt
{

  public function __construct(PDO $pdo)
  {
    parent::__construct($pdo);    
  }

  function registerNewUser(array $data)
  {
    try {
      $pwd = password_hash($data['pwd'], PASSWORD_DEFAULT);
      $query = 'insert into users (mail, pwd) values (:name, :pwd);';
      $q = $this->pdo->prepare($query);
      $q->bindValue(':name', $data['mail']);
      $q->bindValue(':pwd', $pwd);
      $q->execute();
      echo ("It went well... welcome to the family.");
      return;
    } catch (PDOException $ex) {
      echo "I'm sorry, your user couldnt' be created.";
      return;
    }
  }

  function addNewArticle(array $data, int $id)
  {
    try {
      $query = 'insert into articles (iduser, title,seotitle,art_date,content) values (:iduser, :title, :seotitle, :art_date, :content);';
      $q = $this->pdo->prepare($query);
      $q->bindValue(':iduser', $id);
      $q->bindValue(':title', $data['title']);
      $q->bindValue(':seotitle', $data['seotitle']);
      $q->bindValue(':art_date', $data['articledate']);
      $q->bindValue(':content', $data['content']);
      $q->execute();
      return true;
    } catch (PDOException $ex) {
      throw new PDOException;
    }
  }

  function modifyArticle(array $data, int $id)
  {
    try {
      $query = 'update articles set (title,seotitle,art_date,content) values (:title, :seotitle, :art_date, :content) where iduser = :iduser;';
      $q = $this->pdo->prepare($query);
      $q->bindValue(':iduser', $id);
      $q->bindValue(':title', $data['title']);
      $q->bindValue(':seotitle', $data['seotitle']);
      $q->bindValue(':art_date', $data['articledate']);
      $q->bindValue(':content', $data['content']);
      $q->execute();
      return true;
    } catch (PDOException $ex) {
      throw new PDOException;
    }
  }
  
  function deleteArticle(array $data, int $id)
  {
    try {
      $query = 'delete from articles where iduser = :iduser;';
      $q = $this->pdo->prepare($query);
      $q->bindValue(':iduser', $id);
      $q->execute();
      return true;
    } catch (PDOException $ex) {
      throw new PDOException;
    }
  }
}
