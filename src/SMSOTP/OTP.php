<?php

namespace SMSOTP;

use Carbon\Carbon;

class OTP
{
    protected $number;
    protected $code;
    protected $is_verified;
    protected $expired_at;

    public function __construct($number = null, $code = null, $is_verified = null, $expired_at = null)
    {
        $this->number = $number;
        $this->code = $code;
        $this->is_verified = $is_verified;
        $this->expired_at = new Carbon($expired_at);
    }

    public function number()
    {
        return $this->number;
    }

    public function code()
    {
        return $this->code;
    }

    public function is_verified()
    {
        return (bool) $this->is_verified;
    }

    public function expired_at()
    {
        return $this->expired_at;
    }

    public function is_expired()
    {
        return Carbon::now()->gt($this->expired_at);
    }

    public function is_valid()
    {
        return $this->number && $this->code;
    }

    public function __set($property, $value)
    {
        if ($property == 'expired_at')
            $value = new Carbon($value);

        $this->{$property} = $value;
    }
}
