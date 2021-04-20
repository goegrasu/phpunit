<?php

class MailerStatic
{

    public static function send(string $email, string $message)
    {
        if (empty($email)) {
            throw new InvalidArgumentException();
        }

        echo "send '$message' to '$email'";

        return true;
    }
}
