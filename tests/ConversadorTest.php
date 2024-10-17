<?php

namespace Conversador\Tests;

use Conversador\Conversador;
use Conversador\MediaMessage;
use Conversador\Message;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class ConversadorTest extends TestCase
{
    private $env;

    protected function setUp(): void
    {
        $this->env = require __DIR__.'/../../env.php';
    }

    public function testSendMessage()
    {
        $conversador = new Conversador($this->env['conversador']['token']);
        $message = new Message($this->env['conversador']['test_number'], 'Unit Test');

        $response = $conversador->sendMessage($message);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('mensagem', $response);
        $this->assertEquals('Mensagem enviada', $response['mensagem']);
    }

    public function testSendMediaMessage()
    {
        $conversador = new Conversador($this->env['conversador']['token']);
        $mediaMessage = new MediaMessage($this->env['conversador']['test_number'], 'tests/assets/file.png');

        $response = $conversador->sendMediaMessage($mediaMessage);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('mensagem', $response);
        $this->assertEquals('Mensagem enviada', $response['mensagem']);
    }
}
