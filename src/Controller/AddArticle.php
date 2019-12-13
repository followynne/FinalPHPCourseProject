<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
class AddArticle implements ControllerInterface
{
    protected $plates;

    public function __construct(Engine $plates)
    {   
        $this->plates = $plates;
    }

    public function execute(ServerRequestInterface $request)
    {
        if (!isset($_SESSION['mail'])){
            echo $this->plates->render('login', []);
        } else {
            echo $this->plates->render('add', []);
        }
    }

}
