<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use SimpleMVC\Model\ReadOnlyOpt;

class Article implements ControllerInterface
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
        $article = $this->conn->getArticleId($request->getQueryParams()['seotitle']);
        $displaybuttonlogin = !isset($_SESSION['mail']) ? "Login" : "Go to your Article Management";
        echo $this->plates->render('article', ['logbtn' => $displaybuttonlogin, 'article'=> $article]);
    }

}
