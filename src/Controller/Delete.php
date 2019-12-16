<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use PDOException;
use SimpleMVC\Model\ConnDB;

class DeleteArticle implements ControllerInterface
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
        } else if ($request->getMethod() != 'POST') {
            echo $this->plates->render('delete', []);
        } else {
            try {
                $this->conn->deleteArticle($request->getParsedBody(), (int) $_SESSION['iduser']);
                echo $this->plates->render('userarticles', ['msg' => 'Article deleted.']);
            } catch (PDOException $ex) {
                echo $this->plates->render('add', ['msg' => 'I\'m sorry, your article couldnt\' be deleted']);
                die();
            }
        }
    }
}