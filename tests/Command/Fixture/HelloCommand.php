<?php

namespace Sergiors\Worker\Test\Command\Fixture;

use Sergiors\Worker\Command\CommandInterface;

class HelloCommand implements CommandInterface
{
    public function execute()
    {
        echo 'hello';
    }
}
