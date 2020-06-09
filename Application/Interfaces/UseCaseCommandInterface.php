<?php
declare(strict_types=1);

/**
 * Application Interface
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Application\Interfaces;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;

/**
 * Interface UseCaseCommandInterface
 * @package Ticaje\AliexpressConsumer\Application\Interfaces
 */
interface UseCaseCommandInterface
{
    public function setCredentials(RequestDtoInterface $dto): self;

    public function setRequest(RequestDtoInterface $dto): self;

    public function getCredentials(): RequestDtoInterface;

    public function getRequest(): RequestDtoInterface;
}
