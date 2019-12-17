<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use PDOException;
use SimpleMVC\Model\ConnDB;

class Delete implements ControllerInterface
{
    protected $plates;

    public function __construct(Engine $plates, ConnDB $conn)
    {
        $this->plates = $plates;
        $this->conn = $conn;
    }

    public function execute(ServerRequestInterface $request)
    {
        if ($_SESSION['mail'] == null) {
            echo $this->plates->render('login', ['msg'=> '403 - Unauthorized']);
        } else {
            try {
                print_r($_SESSION['iduser']);
                $this->conn->deleteArticle($request->getQueryParams()['id'], (int)$_SESSION['iduser']);
                echo $this->plates->render('userarticles', ['msg' => 'Article deleted.']);
                die();
            } catch (PDOException $ex) {
                echo $this->plates->render('userarticles', ['msg' => 'I\'m sorry, your article couldn\'t be deleted']);
                die();
            }
        }
    }
}