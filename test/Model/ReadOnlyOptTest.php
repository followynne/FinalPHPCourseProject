<?php
declare(strict_types=1);

namespace SimpleMVC\Test\Controller;

use DI\ContainerBuilder;
use League\Plates\Engine;
use PDO;
use PDOException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\ReadOnlyOpt;

final class ReadOnlyOptTest extends TestCase
{
    public function setUp(): void
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions('config/container.php');
        $this->container = $containerBuilder->build();
        $this->plates = $this->container->get(Engine::class);
        $this->request = $this->getMockBuilder(ServerRequestInterface::class)->getMock();
        $this->test = $this->container->get(ReadOnlyOpt::class);
    }

    public function tearDown() : void {
    }

    public function testCheckUser(): void
    {
        $this->assertFalse($this->test->checkUser('marco'));
        $this->assertIsArray($this->test->checkUser('prova@prova.it'));
    }

    public function testCheckLogin() : void
    {
        $this->assertFalse($this->test->checkLogin(array("mail" => 'exception', 'pwd' => '')));
        $this->assertFalse($this->test->checkLogin(array("mail" => 'prova@prova.it', 'pwd' => '')));
        $this->assertIsString($this->test->checkLogin(array("mail" => 'prova@prova.it', 'pwd' => 'marcone')));
    }

    public function testGetAllArticle() : void 
    {
        //$this->expectException(PDOException::class);
        $this->assertIsArray($this->test->GetAllArticle());
    }
}
