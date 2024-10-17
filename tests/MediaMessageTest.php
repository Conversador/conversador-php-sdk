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
}
