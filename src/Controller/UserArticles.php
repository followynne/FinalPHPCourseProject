<?php
declare(strict_types=1);
namespace SimpleMVC\Controller;

use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;
class UserArticles implements ControllerInterface
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
        } else {
            //create articles per user - please send request via id & not seotitle
            echo $this->plates->render('userarticles', ['articles' => 'placeholder']);
        }
    }

}
