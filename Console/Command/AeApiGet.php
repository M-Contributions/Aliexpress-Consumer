<?php
declare(strict_types=1);

/**
 * Console Command Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AliexpressConsumer\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Ticaje\AConnector\Interfaces\Protocol\RestClientInterface;
use Ticaje\AeSdk\Api\Interfaces\Get\OrderGetInterface;
use Ticaje\AeSdk\Api\Interfaces\Get\ProductGetInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Request\GeneralRequestDto;
use Ticaje\AeSdk\Api\Interfaces\ApiGetInterface;
use Ticaje\AeSdk\Api\Interfaces\Get\MerchantProfileGetInterface;
use Ticaje\AeSdk\Api\Interfaces\Get\CategoryTreeInterface;

/**
 * Class AeApiGet
 * @package Ticaje\AliexpressConsumer\Console\Command
 */
class AeApiGet extends Command
{
    use BaseTrait;

    private $apiOrderGet;

    private $apiFreightGet;

    private $apiPromiseGet;

    private $apiMerchant;

    private $apiCategoryTree;

    private $apiAttributeGet;

    private $apiProductGet;

    public function __construct(
        OrderGetInterface $apiOrderGet,
        ApiGetInterface $apiFreightGet,
        ApiGetInterface $apiPromiseGet,
        MerchantProfileGetInterface $apiMerchant,
        CategoryTreeInterface $apiCategoryTree,
        ApiGetInterface $apiAttributeGet,
        ProductGetInterface $apiProductGet,
        string $name = null
    ) {
        $this->apiOrderGet = $apiOrderGet;
        $this->apiFreightGet = $apiFreightGet;
        $this->apiPromiseGet = $apiPromiseGet;
        $this->apiMerchant = $apiMerchant;
        $this->apiCategoryTree = $apiCategoryTree;
        $this->apiAttributeGet = $apiAttributeGet;
        $this->apiProductGet = $apiProductGet;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("aliexpress:consumer:apiGet");
        $this->setDescription("Resources Get related APIs");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Launching Logic ...");
        $this->launch($output);
    }

    private function launch(OutputInterface $output)
    {
        $generalDto = new GeneralRequestDto();
        $generalDto->setHeaders([RestClientInterface::CONTENT_TYPE_KEY => RestClientInterface::CONTENT_TYPE_JSON]);
        //$this->setVendorVdshop($generalDto);
        $this->setVendorFlamingos($generalDto);
        //$result = $this->getPromiseTemplates($generalDto);
        //$result = $this->getOrderInfo($generalDto);
        $result = $this->getOrderList($generalDto);
        //$result = $this->getProductSchemaInfo($generalDto);
        //$result = $this->getProductGroups($generalDto);
        //$result = $this->getOrderReceipt($generalDto);
        //$result = $this->getShippingTemplates($generalDto);
        //$result = $this->getMerchantInfo($generalDto);
        //$result = $this->getCategoryTree($generalDto);
        //$result = $this->getAttributeInfo($generalDto);
        //$result = $this->getAttributeList($generalDto);
        print_r($result);
    }

    private function getCategoryTree($generalDto)
    {
        $templates = $this->apiCategoryTree->list($generalDto, ['category_id' => 509]);
        return $templates;
    }

    private function getPromiseTemplates($generalDto)
    {
        $templates = $this->apiPromiseGet->list($generalDto, []);
        return $templates;
    }

    private function getShippingTemplates($generalDto)
    {
        $templates = $this->apiFreightGet->list($generalDto, []);
        return $templates;
    }

    private function getMerchantInfo($generalDto)
    {
        $templates = $this->apiMerchant->get($generalDto, []);
        return $templates;
    }

    private function getOrderInfo($generalDto)
    {
        $order = $this->apiOrderGet->get($generalDto, ['order_id' => '8015523749019802']);
        return $order;
    }

    private function getProductSchemaInfo($generalDto)
    {
        $schema = $this->apiProductGet->schema($generalDto, ['aliexpress_category_id' => '348']);
        $result = json_decode($schema->getSchema()->schema);
        //$result = $schema->getSchema();
        return $result;
    }

    private function getProductGroups($generalDto)
    {
        $groups = $this->apiProductGet->groups($generalDto, []);
        $result = $groups;
        return $result;
    }

    private function getOrderReceipt($generalDto)
    {
        $receipt = $this->apiOrderGet->info($generalDto, ['order_id' => '8014437613809802']);
        return $receipt;
    }

    private function getAttributeInfo($generalDto)
    {
        $order = $this->apiAttributeGet->get($generalDto, ['aliexpress_category_id' => '348', 'category_id' => '11112222']);
        return $order;
    }

    private function getAttributeList($generalDto)
    {
        $order = $this->apiAttributeGet->list($generalDto, ['cate_id' => '200135143']);
        return $order;
    }

    private function getOrderList($generalDto)
    {
        $serviceDto = [
            'current_page' => 1,
            'page_size' => 25,
            //'order_status_list' => ['IN_ISSUE']
        ];
        $orders = $this->apiOrderGet->list($generalDto, $serviceDto);
        return $orders;
    }
}
