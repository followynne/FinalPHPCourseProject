<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use SimpleMVC\Model\ConnDB;

class Login implements ControllerInterface
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
        $result = $this->conn->checkLogin($request->getQueryParams());
        //WIP - getQueryParams doesn't send both the params to the function.
        if ($result == "Access Confirmed, Bzzzz, open the doors, disclose the secrets."){
            $_SESSION['username'] = $request->getQueryParams()['user'];
            echo $this->plates->render('admin');
        } else {

            echo $this->plates->render('login');
        }
        
        
    }

}