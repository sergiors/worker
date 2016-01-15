<?php
namespace Sergiors\Worker\Test\Command\Fixture;

use Sergiors\Worker\Command\CommandInterface;

class HelloCommand implements CommandInterface
{
    protected $container;

    public function setContainer(\ArrayAccess $container)
    {
        $this->container = $container;
    }

    public function execute()
    {
        echo $this->container['hello'];
    }
}
