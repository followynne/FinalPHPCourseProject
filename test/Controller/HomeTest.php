<?php
declare(strict_types=1);

namespace SimpleMVC\Test\Controller;

use DI\ContainerBuilder;
use League\Plates\Engine;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Controller\Home;
use SimpleMVC\Model\ReadOnlyOpt;

final class HomeTest extends TestCase
{
    protected $container;
    public function setUp():void
    {
        $builder = new ContainerBuilder();
        $builder->addDefinitions('config/container.php');
        $this->container = $builder->build();
        $this->plates = new Engine('src/View');
        $this->home = new Home($this->plates, $this->container->get(ReadOnlyOpt::class));
        $this->request = $this->getMockBuilder(ServerRequestInterface::class)->getMock();
    }

    public function testExecuteRenderHomeView(): void
    {
        $test = $this->container->get(ReadOnlyOpt::class);
        $this->expectOutputString($this->plates->render('home', ['logbtn' => 'Login', 'articles' => $test->getAllArticle()]));
        $this->home->execute($this->request);
    }
}
