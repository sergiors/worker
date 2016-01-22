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
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Worker constructor.
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->instanceHash = Uuid::uuid4()->toString();
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    public function getInstanceHash()
    {
        return $this->instanceHash;
    }
}
