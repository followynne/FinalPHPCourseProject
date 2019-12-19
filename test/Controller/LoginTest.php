<?php
declare(strict_types=1);

namespace SimpleMVC\Test\Controller;

use League\Plates\Engine;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Controller\Error404;

final class LoginTest extends TestCase
{
    public function setUp(): void
    {
        $this->plates = new Engine('src/View');
        $this->home = new Error404($this->plates);
        $this->request = $this->getMockBuilder(ServerRequestInterface::class)->getMock();
    }

}
