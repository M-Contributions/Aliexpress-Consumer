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
use Ticaje\AeSdk\Api\Interfaces\Post\ProductPostInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Request\GeneralRequestDto;

/**
 * Class AeApiPost
 * @package Ticaje\AliexpressConsumer\Console\Command
 */
class AeApiPost extends Command
{
    use BaseTrait;

    private $apiProductPost;

    public function __construct(
        ProductPostInterface $apiProductGet,
        string $name = null
    ) {
        $this->apiProductPost = $apiProductGet;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("aliexpress:consumer:apiPost");
        $this->setDescription("Resources Post related APIs");
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
        //$this->setVendorFlamingos($generalDto);
        $this->setVendorVdshop($generalDto);
        $result = $this->postProductStandard($generalDto);
        //$result = $this->postProductBySchema($generalDto);
        print_r($result);
    }

    private function postProductBySchema($generalDto)
    {
        $jsonData = '';
        $key = $this->apiProductPost->getParamsWrapper();
        $result = $this->apiProductPost->post($generalDto, [$key => $jsonData]);
        return $result;
    }

    private function postProductStandard($generalDto)
    {
        $params = '{"subject":"Headscarf Women","brand_name":"Esnone","service_policy_id":0,"aliexpress_category_id":32005,"sku_info_list":[{"price":"12.21","discount_price":"9.99","inventory":0,"sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"red","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"123abc"},{"price":"12.21","inventory":"100","sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"green","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"989abc"}],"inventory_deduction_strategy":"payment_success_deduct","shipping_lead_time":"3","description":"Headscarf Women","freight_template_id":"1001857013","package_width":"30","package_height":"20","package_length":"10","attribute_list":[{"attribute_value":"Knee Length","attribute_name":"Dresses Length"},{"attribute_value_id":"349906","attribute_name_id":"200008911"}],"language":"es","weight":"5","main_image_urls_list":["https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"]}';
        $key = $this->apiProductPost->getParamsWrapper();
        $result = $this->apiProductPost->post($generalDto, [$key => $params]);
        return $result;
    }
}
