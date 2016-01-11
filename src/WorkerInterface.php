<?php
namespace Sergiors\Worker;

use Sergiors\Worker\Command\CommandInterface;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
interface WorkerInterface
{
    /**
     * @param CommandInterface $command
     */
    public function put(CommandInterface $command);
}
