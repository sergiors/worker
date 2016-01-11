<?php
namespace Sergiors\Worker\Logger\Handler;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Sergiors\Worker\WorkerInterface;
use Sergiors\Worker\Command\NotificationCommandInterface;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
class NotificationHandler extends AbstractProcessingHandler
{
    /**
     * @var WorkerInterface
     */
    private $worker;

    /**
     * @var NotificationCommandInterface
     */
    private $command;

    /**
     * @param WorkerInterface $worker
     * @param NotificationCommandInterface $command
     * @param int $level
     * @param bool $bubble
     */
    public function __construct(
        WorkerInterface $worker,
        NotificationCommandInterface $command,
        $level = Logger::ERROR,
        $bubble = true
    ) {
        $this->worker = $worker;
        $this->command = $command;

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritdoc}
     */
    public function handleBatch(array $records)
    {
        $messages = [];
        foreach ($records as $record) {
            if ($record['level'] < $this->level) {
                continue;
            }
            $messages[] = $this->processRecord($record);
        }
        if (!empty($messages)) {
            $this->send((string) $this->getFormatter()->formatBatch($messages), $records);
        }
    }

    private function send($content, array $record)
    {
        $this->command->setSubject($record['level_name']);
        $this->command->setBody($content);

        $this->worker->put($this->command);
    }

    /**
     * {@inheritdoc}
     */
    protected function write(array $record)
    {
        if ($record['level'] < $this->level) {
            return;
        }

        $this->send((string) $record['formatted'], $record);
    }
}
