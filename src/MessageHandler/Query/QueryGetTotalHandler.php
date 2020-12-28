<?php


namespace App\MessageHandler\Query;


use App\Message\Query\QueryGetTotal;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class QueryGetTotalHandler implements MessageHandlerInterface
{
    public function __invoke(QueryGetTotal $queryGetTotal)
    {
        return 50;
    }

}
