<?php


namespace App\Messenger;


use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\MessageDecodingFailedException;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

class JsonMessengerSerializer implements SerializerInterface
{

    public function decode(array $encodedEnvelope): Envelope
    {
        // TODO: Implement decode() method.
    }

    public function encode(Envelope $envelope): array
    {
        // TODO: Implement encode() method.
    }
}
