<?php

namespace Sergiors\Worker\Test;

use Sergiors\Worker\AbstractWorker;

class AbstractWorkerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldHaveUniqueId()
    {
        $worker1 = $this->getMockForAbstractClass(AbstractWorker::class);
        $worker2 = $this->getMockForAbstractClass(AbstractWorker::class);

        $this->assertNotEquals($worker1->getInstanceHash(), $worker2->getInstanceHash());
    }
}
