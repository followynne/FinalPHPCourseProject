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
      $query = 'update articles set title = :title, seotitle = :seotitle, art_date = :art_date, content = :content where id = :id;';
      $q = $this->pdo->prepare($query);
      $q->bindValue(':id', $id);
      $q->bindValue(':title', $data['title']);
      $q->bindValue(':seotitle', $data['seotitle']);
      $q->bindValue(':art_date', $data['articledate']);
      $q->bindValue(':content', $data['content']);
      $q->execute();
    } catch (PDOException $ex) {
      throw new PDOException;
    }
  }
  
  function deleteArticle(string $id, int $iduser)
  {
    try {
      $query = 'delete from articles where seotitle = :id and iduser = :iduser;';
      $q = $this->pdo->prepare($query);
      $q->bindValue(':id', $id);
      $q->bindValue(':iduser', $iduser);
      $q->execute();
      return $q->rowCount();
    } catch (PDOException $ex) {
      throw new PDOException;
    }
  }
}
