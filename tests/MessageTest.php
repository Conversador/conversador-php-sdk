<?php

namespace Conversador\Tests;

use Conversador\Message;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class MessageTest extends TestCase
{
    public function testGetNumber()
    {
        $message = new Message('5551998917243', 'Sua mensagem');

        $this->assertEquals('5551998917243', $message->getNumber());
    }

    public function testGetBody()
    {
        $message = new Message('5551998917243', 'Sua mensagem');

        $this->assertEquals('Sua mensagem', $message->getBody());
    }
}
