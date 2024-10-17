<?php

namespace Conversador;

class Message
{
    private $number;
    private $body;

    public function __construct(string $number, string $body)
    {
        $this->number = $number;
        $this->body = $body;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
