<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use SimpleMVC\Model\ReadOnlyOpt;

class Login implements ControllerInterface
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
        if($request->getMethod() != 'POST'){

            if (isset($_SESSION['mail'])){
                echo $this->plates->render('admin');
            } else {
                echo $this->plates->render('login');
            }

        } else {
            if($this->conn->checkLogin($request->getParsedBody())){
                // set session cookie
                $_SESSION['mail'] = $request->getParsedBody()['mail'];
                echo $this->plates->render('admin');
            } else {

                // add here what to do if login fail

                echo $this->plates->render('login');
            }

        }

    }

}
