<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use PDOException;
use SimpleMVC\Model\ConnDB;

class AddArticle implements ControllerInterface
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
            echo $this->plates->render('add', ['msg' => '']);
        } else {
            try {
                $this->conn->addNewArticle($request->getParsedBody(), (int) $_SESSION['iduser']);
                echo $this->plates->render('admin', ['msg' => 'Article added.']);
            } catch (PDOException $ex) {
                echo $this->plates->render('add', ['msg' => 'I\'m sorry, your article couldnt\' be added']);
                die();
            }
        }
    }
}
