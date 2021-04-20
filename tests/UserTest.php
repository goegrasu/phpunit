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
}
