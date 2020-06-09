<?php

declare(strict_types=1);

/**
 * Test Suite
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Test\Unit\Domain\Entity;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Request\ServiceRequestDto;
use Ticaje\AliexpressConsumer\Test\Unit\BaseTest as ParentClass;

use Ticaje\AliexpressConsumer\Domain\Entity\Request\Builder\Product\Post as PostProductBuilder;
use Ticaje\AliexpressConsumer\Domain\Interfaces\Entity\RequestBuilderInterface;

/**
 * Class PostProductBuilderTest
 * @package Ticaje\AliexpressConsumer\Test\Unit\Domain\Entity
 */
class PostProductBuilderTest extends ParentClass
{
    protected $class = PostProductBuilder::class;

    protected $interface = RequestBuilderInterface::class;

    public function testReturnsJsonString()
    {
        ($prepareRequest = function () use (&$request) {
            $request = new ServiceRequestDto();
            $this->assertInstanceOf(RequestDtoInterface::class, $request, 'Assert proper object passed as argument');
        })();

        $result = $this->instance->build($request);
        $this->assertJson($result, 'Assert returns json');
    }
}
