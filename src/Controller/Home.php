<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;
chdir(dirname(__DIR__));

use DI\ContainerBuilder;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\DBOperations;

class Home implements ControllerInterface
{
    protected $plates;
    protected $c;

    public function __construct(Engine $plates, DBOperations $c)
    {   
        $this->c = $c;
        $this->plates = $plates;
    }

    public function execute(ServerRequestInterface $request)
    {
        echo $this->plates->render('home', ['val' => $this->c->test()]);
    }

}
