<?php

namespace App\MessageHandler\Command;

use App\Message\Command\IndexingMessage;
use App\Message\Command\SendEmailMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

final class IndexingMessageHandler implements MessageHandlerInterface
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(IndexingMessage $message)
    {
//        sleep(10);
        $this->bus->dispatch(new SendEmailMessage('Hello from IndexingMessageHandler'));
    }
}
