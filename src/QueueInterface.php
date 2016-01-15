<?php
namespace Sergiors\Worker;

use Sergiors\Worker\Command\CommandInterface;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
interface QueueInterface
{
    /**
     * @return CommandInterface
     */
    public function getCommand();

    /**
     * @param CommandInterface $command
     */
    public function setCommand(CommandInterface $command);
}
