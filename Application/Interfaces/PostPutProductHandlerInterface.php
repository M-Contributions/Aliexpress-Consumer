<?php
declare(strict_types=1);

/**
 * Application Interface
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Application\Interfaces;

use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;

/**
 * Interface PostPutProductHandlerInterface
 * @package Ticaje\AliexpressConsumer\Application\Interfaces
 */
interface PostPutProductHandlerInterface
{
    /**
     * @param UseCaseCommandInterface $command
     * @return DecoratorInterface
     */
    public function handle(UseCaseCommandInterface $command): DecoratorInterface;
}
