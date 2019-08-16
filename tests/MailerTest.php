<?php

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue()
    {
        $this->assertTrue(Mailer::send('dave@example.com', 'hello'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);

        Mailer::send('','');
    }
}