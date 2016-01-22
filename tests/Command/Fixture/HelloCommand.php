<?php

namespace Sergiors\Worker\Test\Command\Fixture;

use Sergiors\Worker\Command\AbstractCommand;

class HelloCommand extends AbstractCommand
{
    public function execute()
    {
        echo $this->container['hello'];
    }
}
