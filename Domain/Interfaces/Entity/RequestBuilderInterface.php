<?php
declare(strict_types=1);

/**
 * Domain Entity Interface
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Domain\Interfaces\Entity;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;

/**
 * Interface RequestBuilderInterface
 * @package Ticaje\AliexpressConsumer\Domain\Interfaces\Entity
 */
interface RequestBuilderInterface
{
    /**
     * @param RequestDtoInterface $request
     * @return string
     * By domain imperative, this method returns a json string that it's gonna be the data sent to AE Sdk.
     */
    public function build(RequestDtoInterface $request): string;
}
