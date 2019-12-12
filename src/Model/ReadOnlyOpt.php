<?php

declare(strict_types=1);

namespace SimpleMVC\Model;

use \PDO;
use \PDOException;

class ReadOnlyOpt
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);
    }

    function checkLogin($data)
    {
        $query = 'SELECT * FROM users where name = :user;';
        $q = $this->pdo->prepare($query);
        $q->bindParam(':user', $data['user']);
        $q->execute();
        $result = $q->fetch();
        if (!$result) {
            return "User doesn't exist.";
        } else {
            if (!password_verify($data['pwd'], $result['pwd'])) {
                return "Access Denied";
            } else {
                return "Access Confirmed, Bzzzz, open the doors, disclose the secrets.";
            }
        }
    }
    public function getAllArticle()
    {
        $sth = $this->pdo->prepare("SELECT * FROM articles;");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function getArticleId($seotitle)
    {
        $sth = $this->pdo->prepare("SELECT * FROM articles WHERE seotitle = :id");
        $sth->bindParam(':id', $seotitle);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }
}
