<?php

namespace Sergiors\Worker\Command;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
interface CommandInterface
{
    /**
     * @param $container
     */
    public function setContainer($container);

    public function execute();
}
