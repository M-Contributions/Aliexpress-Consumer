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

use Ticaje\AeSdk\Infrastructure\Provider\Request\ServiceRequestDto as ServiceRequestDto;
use Ticaje\AeSdk\Infrastructure\Provider\Request\GeneralRequestDto;
use Ticaje\AliexpressConsumer\Application\Interfaces\CommandHandlerBusFacadeInterface;
use Ticaje\AliexpressConsumer\Application\Interfaces\UseCaseCommandInterface;


/**
 * Class BusCommandHandler
 * @package Ticaje\AliexpressConsumer\Console\Command
 */
class BusCommandHandler extends Command
{
    use BaseTrait;

    private $commandBus;

    private $postCommand;

    private $putCommand;

    public function __construct(
        CommandHandlerBusFacadeInterface $commandBus,
        UseCaseCommandInterface $postCommand,
        UseCaseCommandInterface $putCommand,
        string $name = null
    ) {
        $this->commandBus = $commandBus;
        $this->postCommand = $postCommand;
        $this->putCommand = $putCommand;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("aliexpress:consumer:commandBus");
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
        //$this->postProduct();
        $this->putProduct();
    }

    private function postProduct()
    {
        $commandP = $this->postCommand;
        $generalDto = new GeneralRequestDto();
        $this->setVendorVdshop($generalDto);
        $commandP->setCredentials($generalDto);
        $request = new ServiceRequestDto();
        $params = '{"subject":"Original Hill","brand_name":"Esnone","service_policy_id":0,"aliexpress_category_id":32005,"sku_info_list":[{"price":"12.21","discount_price":"9.99","inventory":0,"sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"red","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"123abc"},{"price":"12.21","inventory":"100","sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"green","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"989abc"}],"inventory_deduction_strategy":"payment_success_deduct","shipping_lead_time":"3","description":"Headscarf Women","freight_template_id":"721452039","package_width":"30","package_height":"20","package_length":"10","attribute_list":[{"attribute_value":"Knee Length","attribute_name":"Dresses Length"},{"attribute_value_id":"349906","attribute_name_id":"200008911"}],"language":"es","group_id":"514661589","weight":"5","main_image_urls_list":["https://img.traveltriangle.com/blog/wp-content/uploads/2020/01/Hill-Stations-Near-Kollam_12th-jan.jpg"]}';
        $request->setContent($params);
        $commandP->setRequest($request);
        $response = $this->commandBus->execute($commandP);
        print_r($response);

    }

    private function putProduct()
    {
        $commandP = $this->putCommand;
        $generalDto = new GeneralRequestDto();
        $this->setVendorVdshop($generalDto);
        $commandP->setCredentials($generalDto);
        $request = new ServiceRequestDto();
        $params = '{"product_id":"4001139959657", "multi_language_subject_list":{"language":"en", "subject":"Beautiful Hill"}, "subject":"Beautiful Hill","brand_name":"Esnone","service_policy_id":0,"aliexpress_category_id":32005,"sku_info_list":[{"price":"15.00","discount_price":"11.00","inventory":0,"sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"red","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"123abc"},{"price":"12.21","inventory":"100","sku_attributes_list":[{"sku_attribute_name":"Color","sku_attribute_value":"green","sku_image":"https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"},{"sku_attribute_name":"US Size","sku_attribute_value":"2"}],"sku_code":"989abc"}],"inventory_deduction_strategy":"payment_success_deduct","shipping_lead_time":"3","description":"Headscarf Women","freight_template_id":"721452039","package_width":"30","package_height":"20","package_length":"10","attribute_list":[{"attribute_value":"Knee Length","attribute_name":"Dresses Length"},{"attribute_value_id":"349906","attribute_name_id":"200008911"}],"language":"es","group_id":"514661589","weight":"5","main_image_urls_list":["https://upload.wikimedia.org/wikipedia/commons/b/b5/Winnersh_Meadows_Trees.jpg"]}';
        $request->setContent($params);
        $commandP->setRequest($request);
        $response = $this->commandBus->execute($commandP);
        print_r($response);

    }

}
