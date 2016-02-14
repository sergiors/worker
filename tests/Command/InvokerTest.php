<?php

namespace Sergiors\Worker\Test\Command;

use Sergiors\Worker\Command\Invoker;
use Sergiors\Worker\Test\Command\Fixture\HelloCommand;

class InvokerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldPrintHello()
    {
        $this->expectOutputString('hello');

        $command = new HelloCommand();
        $invoker = new Invoker();
        $invoker->setCommand($command);
        $invoker->run();
    }
}
