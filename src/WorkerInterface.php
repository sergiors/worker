<?php

namespace Sergiors\Worker;

use Sergiors\Worker\Command\CommandInterface;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
interface WorkerInterface
{
    /**
     * @return string
     */
    public function getInstanceHash();

    /**
     * @param CommandInterface $command
     */
    public function put(CommandInterface $command);

    /**
     * @param \Closure $callable
     */
    public function run(\Closure $callable);
}
