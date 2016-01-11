<?php
namespace Sergiors\Worker\Command;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
class Invoker
{
    /**
     * @var \Pimple
     */
    protected $container;

    /**
     * @var CommandInterface
     */
    protected $command;

    /**
     * @param \Pimple $container
     */
    public function __construct(\Pimple $container)
    {
        $this->container = $container;
    }

    /**
     * @param CommandInterface $command
     */
    public function setCommand(CommandInterface $command)
    {
        $this->command = $command;
        $this->command->setContainer($this->container);
    }

    public function run()
    {
        $this->command->execute();
    }
}
