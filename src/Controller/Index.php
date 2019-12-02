<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
use SimpleMVC\Model\ConnDB;

class Index implements ControllerInterface
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
        if (!isset($_SESSION)){
            echo $this->plates->render('login', []);
        } else {
            echo $this->plates->render('home', []);
        }
    }

}
