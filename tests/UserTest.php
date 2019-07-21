<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testResultEquels()
    {
        $user= new User();

        $user->firstName='Maxim';
        $user->secondName='Tokar';

        $this->assertEquals('Maxim Tokar', $user->getFullName());
    }

    public function testResultNotEquels()
    {
        $user = new User();

        $this->assertEquals('',$user->getFullName());
    }

    public function testNotificationIsSent()
    {
        $user = new User();

        $mockMailer = $this->createMock(Mailer::class);

        $mockMailer->expects($this->once())
            ->method('sendMessage')
            ->with('maxim@gmail.com', 'Hello')
            ->willReturn(true);

        $user->setMailer($mockMailer);

        $user->email = 'maxim@gmail.com';

        $this->assertTrue($user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User();

        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
        ->getMock();

        $user->setMailer($mockMailer);

        $this->expectException(Exception::class);

        $user->notify("Hello");
    }
}