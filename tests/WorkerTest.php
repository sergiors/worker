<?php
namespace Sergiors\Worker\Test;

use Sergiors\Worker\Worker;

class WorkerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldHaveUniqueId()
    {
        $worker1 = $this->getMockForAbstractClass(Worker::class);
        $worker2 = $this->getMockForAbstractClass(Worker::class);

        $this->assertNotEquals($worker1->getInstanceHash(), $worker2->getInstanceHash());
    }
}
