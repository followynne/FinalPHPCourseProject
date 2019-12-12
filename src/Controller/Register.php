<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
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
        if($request->getMethod()!= 'POST'){
          echo $this->plates->render('register');
        } else {
            if(!($user = $this->conn->checkUser($_POST['user']))){
              $pdo = $this->conn->registerNewUser($_POST);
              echo $this->plates->render('login');
            } else {
              // add here what to do if user already exist

              echo $this->plates->render('register');
            }

        }
    }
}
