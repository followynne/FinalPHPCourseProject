<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use SimpleMVC\Model\ConnDB;

class UserArticles implements ControllerInterface
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
        if ($_SESSION['mail'] == null) {
            echo $this->plates->render('login', ['msg'=> '403 - Unauthorized']);
        }  else {
            echo $this->plates->render('userarticles', ['articles' => $this->conn->getUserArticles($_SESSION['iduser'])]);
        }
    }

}
