Introduction
------------

SMS OTP for Laravel 5 using iSMS gateway.


Installation
------------

Add sms-otp to your composer.json file:

```composer.phar require "aqlx86/sms-otp"```


Add the service provider to your Laravel application config:

```PHP
SMSOTP\SMSOTPServiceProvider::class
```

Configuration
-------------

```
php artisan vendor:publish --provider="SMSOTP\SMSOTPServiceProvider"
php artisan migrate
```

Update `config/smsotp.php`
```
return [
    // isms username
    'username' => env('ISMS_USERNAME'),

    // isms password
    'password' => env('ISMS_PASSWORD'),

    // otp code expiration in seconds
    'ttl' => 300
];

```

Usage
-----


Test
----

PHPSpec
```
./bin/phpspec run
```


