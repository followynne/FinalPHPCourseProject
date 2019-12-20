<?php

declare(strict_types=1);

namespace SimpleMVC\Test\Controller;

use DI\ContainerBuilder;
use League\Plates\Engine;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Controller\Delete;
use SimpleMVC\Model\ConnDB;
use Zend\Diactoros\ServerRequest;

final class DeleteTest extends TestCase
{
    public function setUp(): void
    {
        @session_start();
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions('config/container.php');
        $this->container = $containerBuilder->build();
        $this->plates = $this->container->get(Engine::class);
        $this->request = $this->getMockBuilder(ServerRequestInterface::class)->getMock();
    }

    public function tearDown(): void
    {
    }

    public function testExecuteDeleteForbidden(): void
    {
        $_SESSION['mail'] = null;
        $this->home = new Delete($this->plates, $this->container->get(ConnDB::class));
        $res = $this->expectOutputString($this->plates->render('login', ['msg' => '403 - Unauthorized']));
        $res2 = $this->home->execute($this->request);
        $this->assertEquals($res, $res2);
    }

    // public function testExecuteDeleteGet(): void
    // {
    //     $_SESSION['mail'] = 'prova@prova.it';
    //     $_SESSION['iduser'] = '1';
    //     $req = new ServerRequest([], [], 'http://localhost:9999/delete', 'GET', 'php://input', [], [], ['id' => 'prova']);
    //     $this->home = new Delete($this->plates, $this->container->get(ConnDB::class));
    //     $this->expectOutputString('userarticles', [
    //                         'articles' => $this->container->get(ConnDB::class)->getUserArticles((int)$_SESSION['iduser']),
    //                         'msg' => 'I\'m sorry, your article couldn\'t be deleted']);
    //     $this->home->execute($req);
    // }
}
