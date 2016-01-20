<?php

namespace Sergiors\Worker\Logger\Handler;

use Monolog\Logger;
use Monolog\Handler\MailHandler;
use Sergiors\Worker\WorkerInterface;
use Sergiors\Worker\Command\MessageCommandInterface;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
class MessageCommandHandler extends MailHandler
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
     * @param WorkerInterface         $worker
     * @param MessageCommandInterface $command
     * @param int                     $level
     * @param bool                    $bubble
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
     * @param string $content
     * @param array  $record
     */
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
        $this->send((string) $record['formatted'], $record);
    }
}
