<?php
declare(strict_types=1);

/**
 * Domain Entity Interface
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Domain\Interfaces\Entity;

/**
 * Interface ProductPostRequestValidatorInterface
 * @package Ticaje\AliexpressConsumer\Domain\Interfaces\Entity
 */
interface ProductPostRequestValidatorInterface extends ProductRequestValidatorInterface
{
    const REQUIRED_ATTRIBUTES = ['group_id', 'aliexpress_category_id', 'language', 'inventory_deduction_strategy', 'weight', 'package_length', 'package_height', 'package_width', 'freight_template_id', 'shipping_lead_time', 'service_policy_id', 'main_image_urls_list'];
}
