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
        } else if ($request->getMethod() == 'GET' ) {
            $article = $this->conn->getArticleId($request->getQueryParams()['id']);
            /** 
             * check if article requested belongs to the user
             */
            if ($_SESSION['iduser'] == $article['iduser']){
                $_SESSION['tmp_id'] = $article['id'];
                $_SESSION['seotitle'] = $article['seotitle'];
                echo $this->plates->render('modify', ['article' => $article, 'msg' => '']);
            } else {
                echo $this->plates->render('userarticles',
                                        [  'articles' => $this->conn->getUserArticles((int)$_SESSION['iduser']),
                                            'msg' => 'Not this time mate, non this time...'
                                        ]);
            }
        } else if ($request->getMethod() == 'POST') {
            try {
                /**
                 * check if the /modify id sent in POST is the same id opened previously via /modify GET
                 */
                if ($request->getQueryParams()['id'] == $_SESSION['seotitle']){
                    $this->conn->modifyArticle($request->getParsedBody(), (int) $_SESSION['tmp_id']);
                    echo $this->plates->render('userarticles',
                                        [   'articles' => $this->conn->getUserArticles((int)$_SESSION['iduser']),
                                            'msg' => 'Article modified'
                                        ]);
                } else {
                    echo $this->plates->render('modify',
                                        ['msg' => 'You tried to hack the site... funny ah ha nope.'
                                        ]);
                }
            } catch (PDOException $ex) {
                echo $this->plates->render('modify',
                                        ['article' => $this->conn->getArticleId($request->getQueryParams()['id']),
                                         'msg' => 'It didn\'t work, check your data.'
                                        ]);
                die();
            }
    
        }
    }
}
