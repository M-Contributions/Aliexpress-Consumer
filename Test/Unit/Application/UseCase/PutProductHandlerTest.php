<?php

declare(strict_types=1);

/**
 * Test Suite
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Test\Unit\Application\UseCase;

use Ticaje\AliexpressConsumer\Test\Unit\BaseTest as ParentClass;

use Ticaje\Contract\Patterns\Implementation\Decorator\Responder\Response;
use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;

use Ticaje\AliexpressConsumer\Application\Interfaces\PostPutProductHandlerInterface;
use Ticaje\AliexpressConsumer\Application\UseCase\Handler\PutProductHandler;
use Ticaje\AliexpressConsumer\Application\UseCase\Command\PutProductCommand;

/**
 * Class PostProductHandlerTest
 * @package Ticaje\AliexpressConsumer\Test\Unit\Application\UseCase
 */
class PutProductHandlerTest extends ParentClass
{
    protected $class = PutProductHandler::class;

    protected $interface = PostPutProductHandlerInterface::class;

    public function setUp()
    {
        // Our instance is gonna be a mocked object.
        $this->instance = $this->getMockBuilder($this->class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testHandle()
    {
        $expectedValue = (new Response())->setMessage('Incorrect request, please check all your data'); // When the time to return real object comes this test must fail.
        $this->instance->method('handle')
            ->willReturn($expectedValue);
        $command = new PutProductCommand();
        $result = $this->instance->handle($command);
        $this->assertInstanceOf(DecoratorInterface::class, $result, 'Returns proper interface');
        $this->assertObjectHasAttribute('success', $result);
        $this->assertContains('Incorrect request', $result->getMessage());
    }
}
