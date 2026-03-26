<?php

namespace Conversador;

class MediaMessage
{
    private string $number;
    private string $mediaPath;
    private ?string $body;
    private ?string $userId;
    private ?string $queueId;
    private bool $sendSignature;
    private bool $closeTicket;
    private ?int $ticketId;
    private bool $noRegister;

    public function __construct(
        string $number,
        string $mediaPath,
        ?string $body = null,
        ?string $userId = null,
        ?string $queueId = null,
        bool $sendSignature = false,
        bool $closeTicket = false,
        ?int $ticketId = null,
        bool $noRegister = false
    ) {
        $this->number = $number;
        $this->mediaPath = $mediaPath;
        $this->body = $body;
        $this->userId = $userId;
        $this->queueId = $queueId;
        $this->sendSignature = $sendSignature;
        $this->closeTicket = $closeTicket;
        $this->ticketId = $ticketId;
        $this->noRegister = $noRegister;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getMediaPath(): string
    {
        return $this->mediaPath;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function getQueueId(): ?string
    {
        return $this->queueId;
    }

    public function isSendSignature(): bool
    {
        return $this->sendSignature;
    }

    public function isCloseTicket(): bool
    {
        return $this->closeTicket;
    }

    public function getTicketId(): ?int
    {
        return $this->ticketId;
    }

    public function isNoRegister(): bool
    {
        return $this->noRegister;
    }
}
