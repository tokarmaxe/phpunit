<?php

class User
{
    public $firstName;

    public $secondName;

    public $email;

    protected $mailer;

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function getFullName()
    {
        return trim("$this->firstName $this->secondName");
    }

    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

}