<?php
declare(strict_types=1);

/**
 * Application Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Application\UseCase\Handler;

use Ticaje\AeSdk\Api\Interfaces\Put\ProductPutInterface as ProductPutMediator;

use Ticaje\AliexpressConsumer\Application\Interfaces\PostPutProductHandlerInterface;
use Ticaje\AliexpressConsumer\Domain\Interfaces\Entity\RequestValidatorInterface;

/**
 * Class PutProductHandler
 * @package Ticaje\AliexpressConsumer\Application\UseCase\Handler
 */
class PutProductHandler implements PostPutProductHandlerInterface
{
    use HandlerTrait;

    private $mediator;

    private $requestValidator;

    private $verb;

    /**
     * PutProductHandler constructor.
     * @param ProductPutMediator $mediator
     * @param RequestValidatorInterface $requestValidator
     * @param string $verb
     */
    public function __construct(
        ProductPutMediator $mediator,
        RequestValidatorInterface $requestValidator,
        string $verb
    ) {
        $this->mediator = $mediator;
        $this->requestValidator = $requestValidator;
        $this->verb = $verb;
    }
}
