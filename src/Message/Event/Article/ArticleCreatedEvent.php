<?php

declare(strict_types=1);

namespace App\Message\Event\Article;

class ArticleCreatedEvent
{
    private int $articleId;

    public function __construct(int $articleId)
    {
        $this->articleId = $articleId;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }
}
