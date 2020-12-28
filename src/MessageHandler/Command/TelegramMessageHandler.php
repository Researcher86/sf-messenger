<?php

namespace App\MessageHandler\Command;

use App\Message\Command\SendEmailMessage;
use App\Message\Command\TelegramMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

final class TelegramMessageHandler implements MessageHandlerInterface
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(TelegramMessage $message)
    {
//        sleep(10);
        $this->bus->dispatch(new SendEmailMessage('Hello from TelegramMessageHandler'));
    }
}
