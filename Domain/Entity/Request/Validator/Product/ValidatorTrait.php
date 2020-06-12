<?php
declare(strict_types=1);

/**
 * Domain Entity Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Domain\Entity\Request\Validator\Product;

use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;

/**
 * Class ValidatorTrait
 * @package Ticaje\AliexpressConsumer\Domain\Entity\Request\Validator\Product
 */
trait ValidatorTrait
{
    /**
     * @inheritDoc
     */
    public function validate(RequestDtoInterface $request): DecoratorInterface
    {
        $requestContent = $request->getContent();
        $params = json_decode($requestContent); // This might be subject to a volatile strategy
        foreach (self::ARTIFACTS as $component) {
            $function = "validate{$component}";
            $validComponent = $this->$function($params);
            if (!$validComponent) {
                return $this->response;
            }
        }
        $this->processResponse(1, "Request is Valid", $requestContent);
        return $this->response;
    }

    /**
     * @param $params
     * @return bool
     */
    private function validateObjects($params)
    {
        $result = is_object($params);
        $result ?: $this->processResponse(0, "Request must be an object");
        return $result;
    }

    /**
     * @param $params
     * @return bool
     */
    private function validateMainImage($params)
    {
        $result = (function () use ($params) {
            $mainImageArray = $params->main_image_urls_list ?? null;
            return $mainImageArray
                && is_array($mainImageArray)
                && 6 > count($mainImageArray);
        })();
        $result ?: $this->processResponse(0, "Incorrect Images compliance");
        return $result;
    }

    /**
     * @param $params
     * @return bool
     */
    private function validateSkuInfoList($params)
    {
        $result = (function ($params) {
            $list = $params->sku_info_list ?? null;
            return $list
                && is_array($list)
                && count($list) > 0
                && (function ($list) {
                    $missing = [];
                    foreach (static::SKU_INFO_LIST_REQUIRED_ATTRIBUTES as $property) {
                        property_exists($list[0], $property) ?: array_push($missing, $property);
                    }
                    return empty($missing);
                })($list);
        })($params);
        $result ?: $this->processResponse(0, "Incorrect Info List compliance");
        return $result;
    }

    /**
     * @param $params
     * @return bool
     */
    private function validateAttributes($params)
    {
        $result = (function ($params) use (&$missing) {
            $missing = [];
            foreach (static::REQUIRED_ATTRIBUTES as $property) {
                property_exists($params, $property) ?: array_push($missing, $property);
            }
            return empty($missing);
        })($params);
        $result ?: (function ($missing) {
            $missingAttributes = implode(', ', $missing);
            $this->processResponse(0, "Missing parameters {$missingAttributes}");
        })($missing);
        return $result;
    }

    /**
     * @param $success
     * @param $message
     * @param null $result
     * Kind of mixing concerns yeh
     */
    private function processResponse($success = true, $message, $result = null)
    {
        $this->response
            ->setSuccess((bool)$success)
            ->setRequest($result)
            ->setMessage($message);
    }
}
