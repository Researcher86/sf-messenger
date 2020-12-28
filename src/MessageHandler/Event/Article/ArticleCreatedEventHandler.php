<?php

declare(strict_types=1);

namespace App\MessageHandler\Event\Article;

use App\Message\Event\Article\ArticleCreatedEvent;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class ArticleCreatedEventHandler implements MessageHandlerInterface
{
    public function __invoke(ArticleCreatedEvent $event)
    {
        return 'ArticleCreatedEventHandler';
    }

}
