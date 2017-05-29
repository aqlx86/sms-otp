<?php

namespace SMSOTP;

use SMSOTP\Contract;
use SMSOTP\Exception;

class OTPVerifier
{
    protected $repository;

    public function __construct(Contract\Repository $repository)
    {
        $this->repository = $repository;
    }

    public function verify($number, $code, $action = OTP::ACTION_DEFAULT)
    {
        $otp = $this->repository->otp_details($number, $code, $action);

        if (! $otp->is_valid())
            throw new Exception\InvalidOTPCodeException('invalid number and otp code');

        if ($otp->is_verified())
            throw new Exception\AlreadyVerifiedException('otp code already verified');

        if ($otp->is_expired())
            throw new Exception\OTPExpiredException('expired otp code');

        return $this->repository->mark_otp_verified($code);
    }
}
