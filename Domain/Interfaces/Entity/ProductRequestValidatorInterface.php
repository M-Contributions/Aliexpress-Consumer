<?php
declare(strict_types=1);

/**
 * Domain Entity Interface
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Domain\Interfaces\Entity;

/**
 * Interface ProductRequestValidatorInterface
 * @package Ticaje\AliexpressConsumer\Domain\Interfaces\Entity
 */
interface ProductRequestValidatorInterface
{
    const SKU_INFO_LIST_REQUIRED_ATTRIBUTES = ['inventory', 'price', 'sku_code', 'discount_price'];

    const ARTIFACTS = ['Objects', 'Attributes', 'SkuInfoList', 'MainImage'];
}
