<?php


class Mailer
{
    public static function send($email, $message)
    {
        if(empty($email)){
            throw new InvalidArgumentException();
        }

        echo "Send $message to $email ";

        return true;
    }
}