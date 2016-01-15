<?php
namespace Sergiors\Worker;

use Ramsey\Uuid\Uuid;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
abstract class Worker implements WorkerInterface
{
    /**
     * @var string
     */
    protected $instanceHash;

    /**
     * @var QueueInterface
     */
    protected $queue;

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

    /**
     * {@inheritdoc}
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * {@inheritdoc}
     */
    public function setQueue(QueueInterface $queue)
    {
        $this->queue = $queue;
    }
}
