<?php
declare(strict_types=1);

/**
 * Domain Entity Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Domain\Entity\Request\Validator\Product;

use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;
use Ticaje\AliexpressConsumer\Domain\Interfaces\Entity\RequestValidatorInterface;
use Ticaje\AliexpressConsumer\Domain\Interfaces\Entity\ProductPostRequestValidatorInterface;

/**
 * Class Post
 * @package Ticaje\AliexpressConsumer\Domain\Entity\Request\Validator\Product
 * This class could be divided into smaller components for the sake of S.o.C principles but i found it
 * almost unnecessary since we come down here to implementation details that from a Domain stand point is not that much relevant.
 */
class Post implements RequestValidatorInterface, ProductPostRequestValidatorInterface
{
    use ValidatorTrait;

    private $response;

    /**
     * Post constructor.
     * @param DecoratorInterface $response
     * Although applying inversion of control adds more coupling to a D.I Framework from a design point of view it's better
     * and it's actually the rule of dumb, even when injecting a Dto based component.
     */
    public function __construct(DecoratorInterface $response)
    {
        $this->response = $response;
    }
}
