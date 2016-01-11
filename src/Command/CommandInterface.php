<?php
namespace Sergiors\Worker\Command;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
interface CommandInterface
{
    /**
     * @param \Pimple $container
     */
    public function setContainer(\Pimple $container);

    public function execute();
}
