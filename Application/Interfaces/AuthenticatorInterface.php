<?php
declare(strict_types=1);

/**
 * Application Interface
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Application\Interfaces;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;

/**
 * Interface AuthenticatorInterface
 * @package Ticaje\AliexpressConsumer\Application\Interfaces
 */
interface AuthenticatorInterface
{
    /**
     * @param RequestDtoInterface $credentials
     * @return RequestDtoInterface
     */
    public function authenticate(RequestDtoInterface $credentials): RequestDtoInterface;
}
