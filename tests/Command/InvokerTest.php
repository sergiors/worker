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

        $container = $this->getMock('ArrayAccess');
        $container
            ->expects($this->any())
            ->method('offsetGet')
            ->will($this->returnValue('hello'));

        $command = new HelloCommand();
        $invoker = new Invoker($container);
        $invoker->setCommand($command);
        $invoker->run();
    }
}
