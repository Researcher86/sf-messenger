<?php

namespace App\Command;

use App\Message\Command\IndexingMessage;
use App\Message\Command\SendEmailMessage;
use App\Message\Command\TelegramMessage;
use App\Message\Query\QueryGetTotal;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class ProducerCommand extends Command
{
    protected static $defaultName = 'app:producer';
    private MessageBusInterface $commandBus;
    private MessageBusInterface $queryBus;
    private MessageBusInterface $eventBus;

    public function __construct(MessageBusInterface $commandBus, MessageBusInterface $queryBus, MessageBusInterface $eventBus)
    {
        parent::__construct();
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
        $this->eventBus = $eventBus;
    }

    protected function configure()
    {
        $this->setDescription('Producer for queue');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->commandBus->dispatch(new IndexingMessage(''));
        $this->commandBus->dispatch(new TelegramMessage(''));
        $this->commandBus->dispatch(new SendEmailMessage(''));

        $envelope = $this->queryBus->dispatch(new QueryGetTotal());
        /** @var HandledStamp $handled */
        $handled = $envelope->last(HandledStamp::class);
        $io->success($handled->getResult());

        $io->success('Finish.');

        return Command::SUCCESS;
    }
}
