<?php

namespace Conversador;

class Message
{
    private string $number;
    private string $body;
    private ?string $userId;
    private ?string $queueId;
    private bool $sendSignature;
    private bool $closeTicket;
    private ?int $ticketId;
    private bool $noRegister;

    public function __construct(
        string $number,
        string $body,
        ?string $userId = null,
        ?string $queueId = null,
        bool $sendSignature = false,
        bool $closeTicket = false,
        ?int $ticketId = null,
        bool $noRegister = false
    ) {
        $this->number = $number;
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

    public function getBody(): string
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

    public function toArray(): array
    {
        $data = [
            'number' => $this->number,
            'body' => $this->body,
        ];

        if ($this->userId !== null) {
            $data['userId'] = $this->userId;
        }

        if ($this->queueId !== null) {
            $data['queueId'] = $this->queueId;
        }

        if ($this->sendSignature) {
            $data['sendSignature'] = true;
        }

        if ($this->closeTicket) {
            $data['closeTicket'] = true;
        }

        if ($this->ticketId !== null) {
            $data['ticketId'] = $this->ticketId;
        }

        if ($this->noRegister) {
            $data['noRegister'] = true;
        }

        return $data;
    }
}
