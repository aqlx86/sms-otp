<?php

namespace SMSOTP;

use SMSOTP\Contract;

class OTPVerifier
{
    protected $repository;

    public function __construct(Contract\Repository $repository)
    {
        $this->repository = $repository;
    }

    public function verify($number, $code)
    {
        $otp = $this->repository->otp_details($number, $code);

        if (! $otp->is_valid())
            throw new \Exception('invalid number and otp code');

        if ($otp->is_verified())
            throw new \Exception('otp code already verified');

        if ($otp->is_expired())
            throw new \Exception('expired otp code');

        $this->repository->mark_otp_verified($code);

        dd ($otp);
    }
}
