<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;

class Modify implements ControllerInterface
{
    protected $plates;

    public function __construct(Engine $plates)
    {   
        $this->plates = $plates;
    }

    public function execute(ServerRequestInterface $request)
    {
        if (!isset($_SESSION)){
            echo $this->plates->render('login', []);
        } else if($request->getMethod()!= 'POST'){
            //create articles per user - please send request via id & not seotitle
            echo $this->plates->render('modify', []);
        } else {
            // if modify goes well send to userarticles
            echo $this->plates->render('userarticles', []);
        }
    }

}
