<?php

declare(strict_types=1);

/**
 * Test Suite
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Test\Unit\Application\UseCase;

use Ticaje\AliexpressConsumer\Test\Unit\BaseTest as ParentClass;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Request\ServiceRequestDto;
use Ticaje\AliexpressConsumer\Application\Interfaces\UseCaseCommandInterface;
use Ticaje\AliexpressConsumer\Application\UseCase\Command\UseCaseCommand;

/**
 * Class CommandTest
 * @package Ticaje\AliexpressConsumer\Test\Unit\Application\UseCase
 */
class CommandTest extends ParentClass
{
    protected $class = UseCaseCommand::class;

    protected $interface = UseCaseCommandInterface::class;

    public function testSettersGetters()
    {
        ($prepareRequest = function () use (&$request) {
            $request = new ServiceRequestDto();
            $this->assertInstanceOf(RequestDtoInterface::class, $request, 'Assert proper object passed as argument');
        })();

        $this->assertInstanceOf($this->interface, $this->instance->setRequest($request), 'Assert returns self object');
        $this->assertInstanceOf($this->interface, $this->instance->setCredentials($request), 'Assert returns self object');
        $this->assertInstanceOf(RequestDtoInterface::class, $this->instance->getCredentials($request), 'Assert returns proper object');
        $this->assertInstanceOf(RequestDtoInterface::class, $this->instance->getRequest($request), 'Assert returns proper object');
    }
}
