<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use SimpleMVC\Model\ReadOnlyOpt;

class Login implements ControllerInterface
{
    protected $plates;
    protected $conn;

    public function __construct(Engine $plates, ReadOnlyOpt $conn)
    {
        $this->plates = $plates;
        $this->conn = $conn;
    }

    public function execute(ServerRequestInterface $request)
    {
        if ($request->getUri()->getPath() == '/logout') {
            $this->logout();
            exit();
        }
        if ($request->getMethod() != 'POST') {
            if (isset($_SESSION['mail'])) {
                echo $this->plates->render('admin', ['msg' => '']);
            } else {
                echo $this->plates->render('login', ['msg' => 'Welcome.']);
            }
        } else {
            $id = $this->conn->checkLogin($request->getParsedBody());
            if (!$id) {
                echo $this->plates->render('login', ['msg' => 'Errore.']);
            } else {
                $_SESSION['mail'] = $request->getParsedBody()['mail'];
                $_SESSION['iduser'] = $id;
                echo $this->plates->render('admin', ['msg' => '']);
                exit;
            }
        }
    }

    private function logout (){
        session_unset();
        session_destroy();
        setcookie('msg', 'See you later!');
        header("Location:/");
    }
}
