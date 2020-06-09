<?php

declare(strict_types=1);

/**
 * Test Suite
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Test\Unit\Application\Strategy;

use Ticaje\AliexpressConsumer\Test\Unit\BaseTest as ParentClass;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Request\Dto;
use Ticaje\AliexpressConsumer\Application\Interfaces\AuthenticatorInterface;
use Ticaje\AliexpressConsumer\Application\Strategy\Authentication\Register;

/**
 * Class AuthRegisterTest
 * @package Ticaje\AliexpressConsumer\Test\Unit\Application\Strategy
 */
class AuthRegisterTest extends ParentClass
{
    protected $class = Register::class;

    protected $interface = AuthenticatorInterface::class;

    public function setUp()
    {
        $requestDto = new Dto();
        $this->instance = $this->getMockBuilder($this->class)
            ->setConstructorArgs(['requestDto' => $requestDto])
            ->getMock();
    }

    public function testAuthenticate()
    {
        ($prepareRequest = function () use (&$request) {
            $request = new Dto();
            $this->assertInstanceOf(RequestDtoInterface::class, $request, 'Assert proper object passed as argument');
        })();

        $this->assertInstanceOf(RequestDtoInterface::class, $this->instance->authenticate($request), 'Assert returns proper object');
    }
}
