<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        // require 'User.php';

        $user = new User();
        $user->first_name = "George";
        $user->surname = "Sirghe";

        $this->assertEquals("George Sirghe", $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();
        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */
    public function userHasFirstname()
    {
        $user = new User();

        $user->first_name = "George";
        $this->assertEquals('George', $user->first_name);
    }

    public function testNotificationIsSent()
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer
            ->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('sirghe@example.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = 'sirghe@example.com';

        $this->assertTrue($user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User;

        // setMethods on the getMockBuilder will set what methods will be stubed 
        $mock_mailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();

        $user->setMailer($mock_mailer);

        $this->expectException(Exception::class);
        $user->notify('Hello');
    }
}
