<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use PDOException;
use SimpleMVC\Model\ConnDB;

class Modify implements ControllerInterface
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
            $article = $this->conn->getArticleId($request->getQueryParams()['id']);
            $_SESSION['tmp_id'] = $article['id'];
            $_SESSION['seotitle'] = $article['seotitle'];
            echo $this->plates->render('modify', ['article' => $article]);
        } else {
            try {
                if ($request->getQueryParams()['id'] == $_SESSION['seotitle']){
                    $this->conn->modifyArticle($request->getParsedBody(), (int) $_SESSION['tmp_id']);
                    echo $this->plates->render('userarticles', ['msg' => 'Article modified']);
                } else {
                    print_R($request->getParsedBody());
                    echo $this->plates->render('modify',
                                        ['article' => $this->conn->getArticleId($request->getQueryParams()['id']),
                                         'msg' => 'It didn\'t work'
                                        ]);
                }
            } catch (PDOException $ex) {
                echo $this->plates->render('modify', ['msg' => 'I\'m sorry, your article couldnt\' be modified']);
                die();
            }
    
        }
    }
}
