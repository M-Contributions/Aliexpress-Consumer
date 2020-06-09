<?php

/**
 * Application Class
 * @author Max Demian <ticaje@filetea.me>
 */

declare(strict_types=1);

namespace Ticaje\AliexpressConsumer\Application\UseCase;

use League\Tactician\CommandBus;
use League\Tactician\Setup\QuickStart as CommandBusHandlerBootstrapper;

use Ticaje\AliexpressConsumer\Application\Interfaces\CommandHandlerBusFacadeInterface;
use Ticaje\AliexpressConsumer\Application\UseCase\Command\UseCaseCommand;

/**
 * Class Bus
 * @package Ticaje\AliexpressConsumer\Application\UseCase
 */
class Bus implements CommandHandlerBusFacadeInterface
{
    /** @var CommandBus $bus */
    private $bus;

    /** @var array $commands */
    private $commands;

    /** @var array $handlers */
    private $handlers;

    /**
     * Bus constructor.
     * @param array $commands
     * @param array $handlers
     * I will define business deps by means DC.
     */
    public function __construct(
        array $commands,
        array $handlers
    ) {
        $this->commands = $commands;
        $this->handlers = $handlers;
        $serviceContract = $this->orchestrate();
        $this->bus = CommandBusHandlerBootstrapper::create($serviceContract);
    }

    /**
     * @inheritDoc
     */
    public function execute(UseCaseCommand $command)
    {
        return $this->bus->handle($command);
    }

    /**
     * @return array
     * Orchestrating service contract
     */
    private function orchestrate()
    {
        $result = [];
        foreach ($this->commands as $index => $command) {
            $result[get_class($command)] = $this->handlers[$index];
        }
        return $result;
    }
}
