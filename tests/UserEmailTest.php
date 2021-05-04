<?php

use PHPUnit\Framework\TestCase;

class UserEmailTest extends TestCase 
{
    public function testNotifyReturnsTrue() 
    {
        $user = new UserEmail('george.sirghe@yahoo.com');        

        //$mailer = $this->createMock(MailerStatic::class);

        //$user->setMailerCallable([MailerStatic::class, 'send']);

        $user->setMailerCallable(function() {
            echo 'mmocked';

            return true;
        });

        $this->assertTrue($user->notify('hello'));
    }
}