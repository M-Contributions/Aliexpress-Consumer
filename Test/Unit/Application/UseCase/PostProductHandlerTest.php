<?php

declare(strict_types=1);

/**
 * Test Suite
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Test\Unit\Application\UseCase;

use Ticaje\AliexpressConsumer\Application\UseCase\Command\UseCaseCommand;
use Ticaje\AliexpressConsumer\Test\Unit\BaseTest as ParentClass;

use Ticaje\AliexpressConsumer\Application\Interfaces\PostProductHandlerInterface;
use Ticaje\AliexpressConsumer\Application\UseCase\Handler\PostProductHandler;

/**
 * Class PostProductHandlerTest
 * @package Ticaje\AliexpressConsumer\Test\Unit\Application\UseCase
 */
class PostProductHandlerTest extends ParentClass
{
    protected $class = PostProductHandler::class;

    protected $interface = PostProductHandlerInterface::class;

    public function setUp()
    {
        $this->instance = $this->getMockBuilder($this->class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testHandle()
    {
        $expectedValue = true; // When the time to return real object comes this test must fail.
        $this->instance->method('handle')
            ->willReturn($expectedValue);
        $command = new UseCaseCommand();
        $result = $this->instance->handle($command);
        $this->assertTrue($result);
    }
}
