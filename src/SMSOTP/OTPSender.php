<?php

namespace SMSOTP;

use SMSOTP\Contract;

class OTPSender
{
    protected $code;
    protected $repository;
    protected $sms;

    public function __construct(Contract\Generator $code, Contract\Repository $repository, Contract\SMSGateway $sms)
    {
        $this->code = $code;
        $this->repository = $repository;
        $this->sms = $sms;
    }

    public function send($number, $message)
    {
        $code = $this->code->generate();

        $message = str_replace(':code', $code, $message);

        $this->sms->send($number, $message);

        $this->repository->save_otp($number, $code);
    }
}
