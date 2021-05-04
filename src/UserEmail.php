<?php

class UserEmail {
    public $email;

    protected $mailer;

    protected $mailer_callable;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailer(MailerStatic $mailer) 
    {
        $this->mailer = $mailer;
    }

    public function setMailerCallable(callable $mailer_callable) 
    {
        $this->mailer_callable = $mailer_callable;
    }

    public function notify(string $message) 
    {
        //return call_user_func($this->mailer_callable, $this->email, $message);        
        return MailerStatic::send($this->email, $message);
    }
}