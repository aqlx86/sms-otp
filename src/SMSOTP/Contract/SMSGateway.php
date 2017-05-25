<?php

namespace SMSOTP\Contract;

interface SMSGateway
{
    public function send($number, $message);
}
