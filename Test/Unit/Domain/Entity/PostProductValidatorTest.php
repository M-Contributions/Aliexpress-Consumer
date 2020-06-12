<?php

declare(strict_types=1);

/**
 * Test Suite
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Test\Unit\Domain\Entity;

use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;
use Ticaje\Contract\Patterns\Implementation\Decorator\Responder\Response;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Request\ServiceRequestDto;
use Ticaje\AliexpressConsumer\Test\Unit\BaseTest as ParentClass;

use Ticaje\AliexpressConsumer\Domain\Entity\Request\Validator\Product\Post as PostProductValidator;
use Ticaje\AliexpressConsumer\Domain\Interfaces\Entity\RequestValidatorInterface;

/**
 * Class PostProductValidatorTest
 * @package Ticaje\AliexpressConsumer\Test\Unit\Domain\Entity
 */
class PostProductValidatorTest extends ParentClass
{
    protected $class = PostProductValidator::class;

    protected $interface = RequestValidatorInterface::class;

    public function setUp()
    {
        $this->instance = new $this->class(new Response());
    }

    public function testProperRequest()
    {
        ($prepareRequest = function () use (&$request) {
            $request = new ServiceRequestDto();
            $request->setContent((new PostProductRequestContainer())->getCompliantContent());
            $this->assertInstanceOf(RequestDtoInterface::class, $request, 'Assert proper object passed as argument');
        })();

        ($evaluateLogic = function ($request) {
            $result = $this->instance->validate($request);
            $this->assertInstanceOf(DecoratorInterface::class, $result, 'Assert returns proper instance');
            $this->assertObjectHasAttribute('success', $result, 'Assert contains success attribute');
            $this->assertTrue($result->getSuccess(), 'Assert valid request');
        })($request);
    }

    public function testBadRequest()
    {
        ($prepareRequest = function () use (&$request) {
            $request = new ServiceRequestDto();
            $request->setContent((new PostProductRequestContainer())->getUnCompliantContent());
            $this->assertInstanceOf(RequestDtoInterface::class, $request, 'Assert proper object passed as argument');
        })();

        ($evaluateLogic = function ($request) {
            $result = $this->instance->validate($request);
            $this->assertInstanceOf(DecoratorInterface::class, $result, 'Assert returns proper instance');
            $this->assertObjectHasAttribute('success', $result, 'Assert contains success attribute');
            $this->assertNotTrue($result->getSuccess(), 'Assert invalid request');
        })($request);
    }
}

/**
 * Class PostProductRequestContainer
 * @package Ticaje\AliexpressConsumer\Test\Unit\Domain\Entity
 */
class PostProductRequestContainer
{
    public function getCompliantContent()
    {
        $params = '{"subject":"Headscarf Women","brand_name":"Esnone","service_policy_id":0,"aliexpress_category_id":32005,"sku_info_list":[{"price":"12.21","discount_price":"9.99","inventory":0,"sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"red","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"123abc"},{"price":"12.21","inventory":"100","sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"green","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"989abc"}],"inventory_deduction_strategy":"payment_success_deduct","shipping_lead_time":"3","description":"Headscarf Women","freight_template_id":"1001857013","package_width":"30","package_height":"20","package_length":"10","attribute_list":[{"attribute_value":"Knee Length","attribute_name":"Dresses Length"},{"attribute_value_id":"349906","attribute_name_id":"200008911"}],"language":"es","group_id":"5","weight":"5","main_image_urls_list":["https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"]}';
        return $params;
    }

    public function getUnCompliantContent()
    {
        $params = '{"subject":"Headscarf Women","brand_name":"Esnone","service_policy_id":0,"sku_info_list":[{"price":"12.21","discount_price":"9.99","inventory":0,"sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"red","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"123abc"},{"price":"12.21","inventory":"100","sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"green","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"989abc"}],"inventory_deduction_strategy":"payment_success_deduct","shipping_lead_time":"3","description":"Headscarf Women","freight_template_id":"1001857013","package_width":"30","package_height":"20","package_length":"10","attribute_list":[{"attribute_value":"Knee Length","attribute_name":"Dresses Length"},{"attribute_value_id":"349906","attribute_name_id":"200008911"}],"language":"es","weight":"5","main_image_urls_list":["https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"]}';
        return $params;
    }
}
