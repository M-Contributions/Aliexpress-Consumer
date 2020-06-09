<?php

declare(strict_types=1);

/**
 * Domain Entity Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Domain\Entity\Request\Builder\Product;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;

use Ticaje\AliexpressConsumer\Domain\Interfaces\Entity\RequestBuilderInterface;

/**
 * Class Post
 * @package Ticaje\AliexpressConsumer\Domain\Entity\Request\Builder\Product
 * I'm free to build an AE product post compliant request and send it to SDK or whatsoever the middleware.
 */
class Post implements RequestBuilderInterface
{
    /**
     * @inheritDoc
     * This is the guy in charge of transforming an agnostic request data into an AE compliant one.
     *
     */
    public function build(RequestDtoInterface $request): string
    {
        // This is just a stub @todo real implementation
        $params = '{"subject":"Headscarf Women","brand_name":"Esnone","service_policy_id":0,"aliexpress_category_id":32005,"sku_info_list":[{"price":"12.21","discount_price":"9.99","inventory":0,"sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"red","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"123abc"},{"price":"12.21","inventory":"100","sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"green","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"989abc"}],"inventory_deduction_strategy":"payment_success_deduct","shipping_lead_time":"3","description":"Headscarf Women","freight_template_id":"1001857013","package_width":"30","package_height":"20","package_length":"10","attribute_list":[{"attribute_value":"Knee Length","attribute_name":"Dresses Length"},{"attribute_value_id":"349906","attribute_name_id":"200008911"}],"language":"es","weight":"5","main_image_urls_list":["https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"]}';
        return $params;
    }
}
