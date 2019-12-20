<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use SimpleMVC\Model\ReadOnlyOpt;

class Home implements ControllerInterface
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
        $articles = $this->conn->getAllArticle();
        $displaybuttonlogin = !isset($_SESSION['mail']) ? "Login" : "Go to your Article Management";
        $out = $request->getCookieParams()['msg'];
        setcookie('msg', '', time() - 3600);
        echo $this->plates->render('home', [
            'logbtn' => $displaybuttonlogin,
            'articles'=> $articles,
            'msg' => $out ]);
    }

}
