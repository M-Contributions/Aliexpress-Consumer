<?php
declare(strict_types=1);

/**
 * Decorator Implementation
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Domain\Entity\Request\Validator;

use Ticaje\Contract\Traits\BaseDto;
use Ticaje\Contract\Patterns\Interfaces\Decorator\Responder\ResponseInterface;

/**
 * Class Response
 * @package Ticaje\AliexpressConsumer\Domain\Entity\Request\Validator
 */
class Response implements ResponseInterface
{
    use BaseDto;

    protected $success;

    protected $request;

    protected $message;
}
