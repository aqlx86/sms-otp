<?php

namespace SMSOTP;

use SMSOTP\Contract\Repository;
use SMSOTP\Models\UserOTP;
use SMSOTP\OTP;

use Carbon\Carbon;

class OTPRepository implements Repository
{
    public function save_otp($number, $code)
    {
        $expired_at = Carbon::now()->addSeconds(config('smsotp.ttl'));

        UserOTP::create([
            'number' => $number,
            'code' => $code,
            'expired_at' => $expired_at
        ]);
    }

    public function otp_details($number, $code)
    {
        $details = UserOTP::where('number', '=', $number)
            ->where('code', '=', $code)
            ->orderBy('created_at', 'desc')
            ->first();

        $otp = new OTP;

        if ($details)
        {
            $otp->number = $details->number;
            $otp->code = $details->code;
            $otp->is_verified = $details->is_verified;
            $otp->expired_at = $details->expired_at;
        }

        return $otp;
    }

    public function mark_otp_verified($code)
    {
        UserOTP::where('code', '=', $code)
            ->update(['is_verified' => true]);
    }
}
