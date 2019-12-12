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

        if(!isset($_POST)){

            if (isset($_SESSION)){
                echo $this->plates->render('admin');
            } else {
                echo $this->plates->render('login');
            }

        } else {

            if($login = $this->conn->checkLogin($_POST)){
                // set session cookie
                echo $this->plates->render('admin');
            } else {

                // add here what to do if login fail

                echo $this->plates->render('login');
            }

        }

    }

}
