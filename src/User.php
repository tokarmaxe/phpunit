<?php


class User
{
    public $email;

    //protected $mailer;

    protected $mailer_callable;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function setMailerCallable(callable $mailer_callable)
    {
        $this->mailer_callable = $mailer_callable;
    }

    public function notify($message)
    {
        //return $this->mailer::send($this->email, $message);
        return call_user_func($this->mailer_callable, $this->email, $message);
    }
}