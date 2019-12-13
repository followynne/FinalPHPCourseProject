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
    $body = $request->getParsedBody();
    if (isset($_SESSION['mail'])) {
      echo $this->plates->render('admin');
      return;
    } else if ($request->getMethod() != 'POST') {
      echo $this->plates->render('register', ['msg' => 'Ciao, inserisci mail e password.']);
      return;
    } else {
      if (filter_var($body['mail'], FILTER_VALIDATE_EMAIL) && strlen($body['pwd']) > 5 && $body['pwd']==$body['pwd-check']) {
        try {
          if ($this->conn->checkUser($request->getParsedBody()['mail']) != null) {
            echo $this->plates->render('register',  ['msg' => 'Error Registering Data.']);
            return;
          } else {
            $this->conn->registerNewUser($request->getParsedBody());return;
            echo $this->plates->render('login', ['msg' => 'Article added.']);
            die();
          }
        } catch (PDOException $ex) {
          echo $this->plates->render('register',  ['msg' => '500.']);
          die();
        }
      } else {
        echo $this->plates->render('register',  ['msg' => 'Error Registering Data.']);
        return;
      }
    }
  }
}
