<?php

namespace Sergiors\Worker\Test\Command\Fixture;

use Sergiors\Worker\Command\Command;

class HelloCommand extends Command
{
    public function execute()
    {
        echo $this->container['hello'];
    }
}
