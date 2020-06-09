<?php

/**
 * Application Class
 * @author Max Demian <ticaje@filetea.me>
 */

declare(strict_types=1);

namespace Ticaje\AliexpressConsumer\Application\UseCase\Handler;

use Ticaje\AeSdk\Api\Interfaces\Post\ProductPostInterface as ProductPostMediator;

use Ticaje\AliexpressConsumer\Application\Interfaces\PostProductHandlerInterface;
use Ticaje\AliexpressConsumer\Application\Interfaces\UseCaseCommandInterface;
use Ticaje\AliexpressConsumer\Domain\Interfaces\Entity\RequestBuilderInterface;

/**
 * Class PostProductHandler
 * @package Ticaje\AliexpressConsumer\Application\UseCase\Handler
 */
class PostProductHandler implements PostProductHandlerInterface
{
    private $mediator;

    private $requestBuilder;

    /**
     * PostProductHandler constructor.
     * @param ProductPostMediator $mediator
     * @param RequestBuilderInterface $requestBuilder
     */
    public function __construct(
        ProductPostMediator $mediator,
        RequestBuilderInterface $requestBuilder
    ) {
        $this->mediator = $mediator;
        $this->requestBuilder = $requestBuilder;
    }

    /**
     * @inheritDoc
     */
    public function handle(UseCaseCommandInterface $command)
    {
        $authenticatorDto = $command->getCredentials();
        $request = [$this->mediator->getParamsWrapper() => $this->requestBuilder->build($command->getRequest())];
        return $this->mediator->post($authenticatorDto, $request);
    }
}
