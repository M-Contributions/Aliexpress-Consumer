<?php

/**
 * Application Class
 * @author Max Demian <ticaje@filetea.me>
 */

declare(strict_types=1);

namespace Ticaje\AliexpressConsumer\Application\UseCase\Handler;

use Ticaje\AliexpressConsumer\Application\Interfaces\GetProductHandlerInterface;
use Ticaje\AliexpressConsumer\Application\Interfaces\UseCaseCommandInterface;

/**
 * Class GetProductGroupsHandler
 * @package Ticaje\AliexpressConsumer\Application\UseCase\Handler
 */
class GetProductGroupsHandler implements GetProductHandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(UseCaseCommandInterface $command)
    {
        print_r(__CLASS__); //@todo implementation
    }
}
