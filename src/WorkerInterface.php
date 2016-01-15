<?php
namespace Sergiors\Worker;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
interface WorkerInterface
{
    /**
     * @return string
     */
    public function getInstanceHash();

    /**
     * @return QueueInterface
     */
    public function getQueue();

    /**
     * @param QueueInterface $queue
     */
    public function setQueue(QueueInterface $queue);

    /**
     * @param \Closure $callable
     */
    public function run(\Closure $callable);
}
