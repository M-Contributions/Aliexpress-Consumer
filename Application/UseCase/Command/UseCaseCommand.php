<?php

/**
 * Application Class
 * @author Max Demian <ticaje@filetea.me>
 */

declare(strict_types=1);

namespace Ticaje\AliexpressConsumer\Application\UseCase\Command;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;
use Ticaje\AliexpressConsumer\Application\Interfaces\UseCaseCommandInterface;

/**
 * Class UseCaseCommand
 * @package Ticaje\AliexpressConsumer\Application\UseCase\Command
 */
class UseCaseCommand implements UseCaseCommandInterface
{
    private $request;

    private $credentials;

    public function setRequest(RequestDtoInterface $dto): UseCaseCommandInterface
    {
        $this->request = $dto;
        return $this;
    }

    public function setCredentials(RequestDtoInterface $dto): UseCaseCommandInterface
    {
        $this->credentials = $dto;
        return $this;
    }

    public function getRequest(): RequestDtoInterface
    {
        return $this->request;
    }

    public function getCredentials(): RequestDtoInterface
    {
        return $this->credentials;
    }
}
