<?php

namespace Conversador\Tests;

use Conversador\MediaMessage;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class MediaMessageTest extends TestCase
{
    public function testGetNumber()
    {
        $mediaMessage = new MediaMessage('5551998917243', 'tests/assets/file.png');

        $this->assertEquals('5551998917243', $mediaMessage->getNumber());
    }

    public function testGetMediaPath()
    {
        $mediaMessage = new MediaMessage('5551998917243', 'tests/assets/file.png');

        $this->assertEquals('tests/assets/file.png', $mediaMessage->getMediaPath());
    }

    public function testGetBody()
    {
        $mediaMessage = new MediaMessage('5551998917243', 'tests/assets/file.png', 'Caption here');

        $this->assertEquals('Caption here', $mediaMessage->getBody());
    }

    public function testGetUserId()
    {
        $mediaMessage = new MediaMessage('5551998917243', 'tests/assets/file.png', null, 'user123');

        $this->assertEquals('user123', $mediaMessage->getUserId());
    }

    public function testGetQueueId()
    {
        $mediaMessage = new MediaMessage('5551998917243', 'tests/assets/file.png', null, null, 'queue456');

        $this->assertEquals('queue456', $mediaMessage->getQueueId());
    }

    public function testIsSendSignature()
    {
        $mediaMessage = new MediaMessage('5551998917243', 'tests/assets/file.png', null, null, null, true);

        $this->assertTrue($mediaMessage->isSendSignature());
    }

    public function testIsCloseTicket()
    {
        $mediaMessage = new MediaMessage('5551998917243', 'tests/assets/file.png', null, null, null, false, true);

        $this->assertTrue($mediaMessage->isCloseTicket());
    }

    public function testGetTicketId()
    {
        $mediaMessage = new MediaMessage('5551998917243', 'tests/assets/file.png', null, null, null, false, false, 123);

        $this->assertEquals(123, $mediaMessage->getTicketId());
    }

    public function testIsNoRegister()
    {
        $mediaMessage = new MediaMessage('5551998917243', 'tests/assets/file.png', null, null, null, false, false, null, true);

        $this->assertTrue($mediaMessage->isNoRegister());
    }
}
