<?php

namespace Sergiors\Worker;

use Ramsey\Uuid\Uuid;
use Psr\Log\LoggerInterface;

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
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Worker constructor.
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
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
