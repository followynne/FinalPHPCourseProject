<?php
declare(strict_types=1);
namespace SimpleMVC\Model;
chdir(dirname(__DIR__));

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

  function test(){
    $query = 'SELECT * FROM users;';
    $q = $this->conn->prepare($query);
    $q->execute();
    return $res = $q->fetchAll();
    }
}
