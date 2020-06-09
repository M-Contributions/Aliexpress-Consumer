<?php
declare(strict_types=1);

/**
 * Application Artifact
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Application\Strategy\Authentication;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;

use Ticaje\AliexpressConsumer\Application\Interfaces\AuthenticatorInterface;

/**
 * Class Register
 * @package Ticaje\AliexpressConsumer\Application\Strategy\Authentication
 */
class Register implements AuthenticatorInterface
{
    private $requestDto;

    /**
     * Register constructor.
     * @param RequestDtoInterface $requestDto
     */
    public function __construct(
        RequestDtoInterface $requestDto
    ) {
        $this->requestDto = $requestDto;
    }

    /**
     * @inheritDoc
     * This is sort of stub until we decide to use this class actively
     */
    public function authenticate(RequestDtoInterface $credentials): RequestDtoInterface
    {
        return $credentials;
    }
}
