<?php

namespace Sergiors\Worker\Command;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
interface CommandInterface
{
    /**
     * @param \ArrayAccess $container
     */
    public function setContainer(\ArrayAccess $container);

    public function execute();
}
