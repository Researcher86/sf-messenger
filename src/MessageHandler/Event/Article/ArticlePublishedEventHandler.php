<?php

declare(strict_types=1);

namespace App\MessageHandler\Event\Article;

use App\Message\Event\Article\ArticlePublishedEvent;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class ArticlePublishedEventHandler implements MessageHandlerInterface
{
    public function __invoke(ArticlePublishedEvent $event)
    {
        return 'ArticlePublishedEventHandler';
    }
}
