<?php

namespace SMSOTP;

use SMSOTP\Contract\Repository;
use SMSOTP\Models\UserOTP;
use SMSOTP\OTP;

use Carbon\Carbon;

class OTPRepository implements Repository
{
    public function save_otp($number, $code, $action = OTP::ACTION_DEFAULT)
    {
        $expired_at = Carbon::now()->addSeconds(config('smsotp.ttl'));

        $otp = UserOTP::updateOrCreate(
            ['number' => $number, 'action' => $action],
            ['code' => $code, 'expired_at' => $expired_at]
        );

        $otp->save();
    }

    public function otp_details($number, $code, $action = OTP::ACTION_DEFAULT)
    {
        $details = UserOTP::where('number', '=', $number)
            ->where('code', '=', $code)
            ->where('action', '=', $action)
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
        return (bool) UserOTP::where('code', '=', $code)
            ->update(['is_verified' => true]);
    }
}
