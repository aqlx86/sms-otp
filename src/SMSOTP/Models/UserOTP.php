<?php

namespace SMSOTP\Models;

use Illuminate\Database\Eloquent\Model;

class UserOTP extends Model
{
    protected $table = 'users_otp';

    protected $fillable = [
        'number',
        'code',
        'is_verified',
        'expired_at'
    ];
}
