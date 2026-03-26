<?php

namespace Conversador;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Utils;

class Conversador
{
    private string $token;
    private Client $client;

    public function __construct(string $token, string $baseUri)
    {
        $this->token = $token;
        $this->client = new Client([
            'base_uri' => $baseUri,
            'headers' => [
                'Authorization' => 'Bearer '.$this->token,
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function sendMessage(Message $message): array
    {
        try {
            $response = $this->client->post('messages/send', [
                'json' => $message->toArray(),
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new \Exception('Erro ao enviar mensagem: '.$e->getMessage());
        }
    }

    public function sendMediaMessage(MediaMessage $mediaMessage): array
    {
        try {
            $multipart = [
                [
                    'name' => 'number',
                    'contents' => $mediaMessage->getNumber(),
                ],
                [
                    'name' => 'medias',
                    'contents' => Utils::tryFopen($mediaMessage->getMediaPath(), 'r'),
                    'filename' => basename($mediaMessage->getMediaPath()),
                ],
            ];

            if ($mediaMessage->getBody() !== null) {
                $multipart[] = [
                    'name' => 'body',
                    'contents' => $mediaMessage->getBody(),
                ];
            }

            if ($mediaMessage->getUserId() !== null) {
                $multipart[] = [
                    'name' => 'userId',
                    'contents' => $mediaMessage->getUserId(),
                ];
            }

            if ($mediaMessage->getQueueId() !== null) {
                $multipart[] = [
                    'name' => 'queueId',
                    'contents' => $mediaMessage->getQueueId(),
                ];
            }

            if ($mediaMessage->isSendSignature()) {
                $multipart[] = [
                    'name' => 'sendSignature',
                    'contents' => 'true',
                ];
            }

            if ($mediaMessage->isCloseTicket()) {
                $multipart[] = [
                    'name' => 'closeTicket',
                    'contents' => 'true',
                ];
            }

            if ($mediaMessage->getTicketId() !== null) {
                $multipart[] = [
                    'name' => 'ticketId',
                    'contents' => (string) $mediaMessage->getTicketId(),
                ];
            }

            if ($mediaMessage->isNoRegister()) {
                $multipart[] = [
                    'name' => 'noRegister',
                    'contents' => 'true',
                ];
            }

            $response = $this->client->post('messages/send', [
                'multipart' => $multipart,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new \Exception('Erro ao enviar mensagem de mídia: '.$e->getMessage());
        }
    }
}
