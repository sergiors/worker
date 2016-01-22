<?php

namespace Sergiors\Worker\Command;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
abstract class AbstractCommand implements CommandInterface
{
    /**
     * @var \ArrayAccess
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(\ArrayAccess $container)
    {
        $this->container = $container;
    }
}
