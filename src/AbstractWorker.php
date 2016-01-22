<?php

namespace Sergiors\Worker;

use Ramsey\Uuid\Uuid;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
abstract class AbstractWorker implements WorkerInterface
{
    /**
     * @var string
     */
    protected $instanceHash;

    /**
     * Worker constructor.
     */
    public function __construct()
    {
        $this->instanceHash = Uuid::uuid4()->toString();
    }

    /**
     * @return string
     */
    public function getInstanceHash()
    {
        return $this->instanceHash;
    }
}
