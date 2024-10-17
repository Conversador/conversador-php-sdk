<?php

namespace Conversador;

class MediaMessage
{
    private $number;
    private $mediaPath;

    public function __construct(string $number, string $mediaPath)
    {
        $this->number = $number;
        $this->mediaPath = $mediaPath;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getMediaPath(): string
    {
        return $this->mediaPath;
    }
}
