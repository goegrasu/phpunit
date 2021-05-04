<?php

use PHPUnit\Framework\TestCase;

class UserEmailMockeryTest extends TestCase 
{
    public function tearDown(): void 
    {
        Mockery::close();
    }

    public function testNotifyReturnsTrue() 
    {
        $user = new UserEmail('george.sirghe@yahoo.com');

        $mailer = Mockery::mock('alias:MailerStatic');

        $mailer->shouldReceive('send')
                ->once()
                ->with($user->email, 'message')
                ->andReturn(true);

        $this->assertTrue($user->notify('message'));
    }
}