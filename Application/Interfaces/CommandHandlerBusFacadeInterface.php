<?php
declare(strict_types=1);

/**
 * Application Interface
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Application\Interfaces;

use Ticaje\AliexpressConsumer\Application\UseCase\Command\UseCaseCommand;

/**
 * Interface CommandHandlerBusFacadeInterface
 * @package Ticaje\AliexpressConsumer\Application\Interfaces
 */
interface CommandHandlerBusFacadeInterface
{
    /**
     * @param UseCaseCommand $command
     * @return mixed
     */
    public function execute(UseCaseCommand $command);
}
