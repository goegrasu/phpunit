<?php

use PHPUnit\Framework\TestCase;

class MailerStaticTest extends TestCase
{
    public function testSendMessageReturnsTrue()
    {
        $this->assertTrue(MailerStatic::send('sirghe@example.com', "a message"));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);

        MailerStatic::send('', "a message");
    }
}
