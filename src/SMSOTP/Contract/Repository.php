<?php

namespace SMSOTP\Contract;

interface Repository
{
    public function save_otp($number, $code);
    public function otp_details($number, $code);
    public function mark_otp_verified($code);
}
