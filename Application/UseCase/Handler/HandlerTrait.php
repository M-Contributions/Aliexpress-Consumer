<?php
declare(strict_types=1);

/**
 * Application Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Application\UseCase\Handler;

use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;

use Ticaje\AliexpressConsumer\Application\Interfaces\UseCaseCommandInterface;

/**
 * Class HandlerTrait
 * @package Ticaje\AliexpressConsumer\Application\UseCase\Handler
 */
trait HandlerTrait
{
    /**
     * @inheritDoc
     */
    public function handle(UseCaseCommandInterface $command): DecoratorInterface
    {
        $serviceRequest = $this->requestValidator->validate($command->getRequest());
        if ($serviceRequest->getSuccess()) {
            $request = [$this->mediator->getParamsWrapper() => $serviceRequest->getRequest()]; // Tiny business policy
            $verb = $this->verb;
            return $this->mediator->$verb($command->getCredentials(), $request);
        } else {
            return $serviceRequest;
        }
    }
}
