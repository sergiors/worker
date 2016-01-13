<?php
namespace Sergiors\Worker\Logger\Handler;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Sergiors\Worker\WorkerInterface;
use Sergiors\Worker\Command\MessageCommandInterface;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
class NotificationHandler extends AbstractProcessingHandler
{
    /**
     * @var WorkerInterface
     */
    protected $worker;

    /**
     * @var MessageCommandInterface
     */
    protected $command;

    /**
     * @param WorkerInterface $worker
     * @param MessageCommandInterface $command
     * @param int $level
     * @param bool $bubble
     */
    public function __construct(
        WorkerInterface $worker,
        MessageCommandInterface $command,
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

    protected function send($content, array $record)
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
