<?php

declare(strict_types=1);

namespace SimpleMVC\Model;

use \PDO;
use \PDOException;

class ReadOnlyOpt
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);
    }

    function checkUser(string $data)
    {
        try {
            $query = 'SELECT id, mail, pwd FROM users where mail = :user;';
            $q = $this->pdo->prepare($query);
            $q->bindValue(':user', $data);
            $q->execute();
            return $q->fetch();
        } catch (PDOException $ex) {
            echo "Error";
            echo $ex;
            return false;
        }
    }

    function checkLogin(array $data)
    {
        $mail = $data['mail'];
        try {
            $result = $this->checkUser($mail);
            if ($result['id'] == null) {
                return false;
            } else {
                if (!password_verify($data['pwd'], $result['pwd'])) {
                    return false;
                } else {
                    return $result['id'];
                }
            }
        } catch (PDOException $ex) {
            echo "Error";
            echo $ex;
            return false;
        }
    }

    public function getAllArticle()
    {
        try {
            $sth = $this->pdo->prepare("SELECT * FROM articles;");
            $sth->execute();
            $result = $sth->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Error";
            echo $ex;
            return false;
        }
    }

    public function getArticleId(string $seotitle)
    {
        try {
            $sth = $this->pdo->prepare("SELECT * FROM articles WHERE seotitle = :id");
            $sth->bindParam(':id', $seotitle);
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $ex) {
            echo "Error";
            echo $ex;
            return false;
        }
    }

    public function getUserArticles (string $iduser)
    {
        try {
            $sth = $this->pdo->prepare("SELECT * FROM articles WHERE iduser = :id");
            $sth->bindParam(':id', $iduser);
            $sth->execute();
            $result = $sth->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Error";
            echo $ex;
            return false;
        }
    }
}
