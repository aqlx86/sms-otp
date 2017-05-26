<?php

namespace SMSOTP\SMS;

use SMSOTP\Contract\SMSGateway;

use ISMS\SMS;
use ISMS\Message;
use ISMS\Recipient;

class ISMS implements SMSGateway
{
    public function send($number, $message)
    {
        $recipient = new Recipient($number);
        $message = new Message($recipient, $message);

        if (! config('smsotp.username') || ! config('smsotp.password'))
            throw new \Exception('invalid isms credentials');

        $isms = new SMS(config('smsotp.username'), config('smsotp.password'), $message);

        $isms->send();
    }
}
