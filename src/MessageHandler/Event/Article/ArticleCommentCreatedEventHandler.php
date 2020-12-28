<?php

declare(strict_types=1);

namespace App\MessageHandler\Event\Article;

use App\Message\Event\Article\ArticleCommentCreatedEvent;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class ArticleCommentCreatedEventHandler implements MessageHandlerInterface
{
    public function __invoke(ArticleCommentCreatedEvent $event)
    {
        return 'ArticleCommentCreatedEventHandler';
    }

}
