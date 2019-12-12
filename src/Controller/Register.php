<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use PDOException;
use SimpleMVC\Model\ConnDB;

class Register implements ControllerInterface
{
  protected $plates;
  protected $conn;

  public function __construct(Engine $plates, ConnDB $conn)
  {
    $this->plates = $plates;
    $this->conn = $conn;
  }

  public function execute(ServerRequestInterface $request)
  {
    if (isset($_SESSION['mail'])) {
      echo $this->plates->render('admin');
    } else if ($request->getMethod() != 'POST') {
      echo $this->plates->render('register', ['msg' => 'Ciao, inserisci mail e password.']);
    } else {
      if ($this->conn->checkUser($request->getParsedBody()['mail']) != null) {
        try {
          $this->conn->registerNewUser($_POST);
          echo $this->plates->render('login', ['msg' => 'Account Created.']);
        } catch (PDOException $ex) {
          echo $this->plates->render('register',  ['msg' => '500.']);
        }
      } else {
        echo $this->plates->render('register',  ['msg' => 'Error Registering Data.']);
      }
    }
  }
}
