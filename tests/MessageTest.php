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

    public function testToArrayWithRequiredFields()
    {
        $message = new Message('5551998917243', 'Sua mensagem');

        $array = $message->toArray();

        $this->assertEquals('5551998917243', $array['number']);
        $this->assertEquals('Sua mensagem', $array['body']);
        $this->assertArrayNotHasKey('userId', $array);
        $this->assertArrayNotHasKey('sendSignature', $array);
    }

    public function testToArrayWithAllFields()
    {
        $message = new Message(
            '5551998917243',
            'Sua mensagem',
            'user123',
            'queue456',
            true,
            true,
            789,
            true
        );

        $array = $message->toArray();

        $this->assertEquals('5551998917243', $array['number']);
        $this->assertEquals('Sua mensagem', $array['body']);
        $this->assertEquals('user123', $array['userId']);
        $this->assertEquals('queue456', $array['queueId']);
        $this->assertTrue($array['sendSignature']);
        $this->assertTrue($array['closeTicket']);
        $this->assertEquals(789, $array['ticketId']);
        $this->assertTrue($array['noRegister']);
    }

    public function testGetUserId()
    {
        $message = new Message('5551998917243', 'Test', 'user123');

        $this->assertEquals('user123', $message->getUserId());
    }

    public function testGetQueueId()
    {
        $message = new Message('5551998917243', 'Test', null, 'queue456');

        $this->assertEquals('queue456', $message->getQueueId());
    }

    public function testIsSendSignature()
    {
        $message = new Message('5551998917243', 'Test', null, null, true);

        $this->assertTrue($message->isSendSignature());
    }

    public function testIsCloseTicket()
    {
        $message = new Message('5551998917243', 'Test', null, null, false, true);

        $this->assertTrue($message->isCloseTicket());
    }

    public function testGetTicketId()
    {
        $message = new Message('5551998917243', 'Test', null, null, false, false, 123);

        $this->assertEquals(123, $message->getTicketId());
    }

    public function testIsNoRegister()
    {
        $message = new Message('5551998917243', 'Test', null, null, false, false, null, true);

        $this->assertTrue($message->isNoRegister());
    }
}
