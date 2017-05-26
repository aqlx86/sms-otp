<?php

return [
    // isms username
    'username' => env('ISMS_USERNAME'),

    // isms password
    'password' => env('ISMS_PASSWORD'),

    // sms provider, default uses isms
    'sms' => SMSOTP\SMS\ISMS::class,

    // sms code generator
    'generator' => SMSOTP\OTPCode::class,

    // repository
    'repository' => SMSOTP\OTPRepository::class,

    // otp code expiration in seconds
    'ttl' => 300
];
