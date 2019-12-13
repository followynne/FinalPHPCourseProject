<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
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
        if (!isset($_SESSION['mail'])=""){
            echo $this->plates->render('login', []);
        } else if($request->getMethod() != 'POST'){
            echo $this->plates->render('add', []);
        } else {
            $res = $this->conn->addNewArticle($request->getParsedBody());
            if (!$res) {
                echo "I'm sorry, your article couldnt' be added.";
                return false;
            } else {
              return true;
                    return false;
            }  
        }
    }

}
