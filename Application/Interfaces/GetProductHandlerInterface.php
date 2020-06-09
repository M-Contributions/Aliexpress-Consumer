<?php
declare(strict_types=1);

/**
 * Application Interface
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Application\Interfaces;

/**
 * Interface PostProductHandlerInterface
 * @package Ticaje\AliexpressConsumer\Application\Interfaces
 */
interface GetProductHandlerInterface
{
    public function handle(UseCaseCommandInterface $command);
}
