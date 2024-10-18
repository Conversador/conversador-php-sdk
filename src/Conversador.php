<?php

namespace Conversador;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Utils;

class Conversador
{
    private $token;
    private $client;

    public function __construct(string $token)
    {
        $this->token = $token;
        $this->client = new Client([
            'base_uri' => 'https://api.conversador.com.br/api/',
            'headers' => [
                'Authorization' => 'Bearer '.$this->token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function sendMessage(Message $message): array
    {
        try {
            $response = $this->client->post('messages/send', [
                'json' => [
                    'number' => $message->getNumber(),
                    'body' => $message->getBody(),
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new \Exception('Erro ao enviar mensagem: '.$e->getMessage());
        }
    }

    public function sendMediaMessage(MediaMessage $mediaMessage): array
    {
        try {
            $response = $this->client->post('messages/send', [
                'multipart' => [
                    [
                        'name' => 'number',
                        'contents' => $mediaMessage->getNumber(),
                    ],
                    [
                        'name' => 'medias',
                        'contents' => Utils::tryFopen($mediaMessage->getMediaPath(), 'r'),
                        'filename' => basename($mediaMessage->getMediaPath()),
                        'headers' => [
                            'Content-Type' => '<Content-type header>',
                        ],
                    ],
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new \Exception('Erro ao enviar mensagem de mídia: '.$e->getTraceAsString());
        }
    }
}
