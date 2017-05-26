## Introduction
SMS OTP for Laravel 5. By default this uses iSMS as SMS provider.

## Installation
Add sms-otp to your composer.json file:

```
composer.phar require "aqlx86/sms-otp"
```

Add the service provider to your Laravel application config/app.php:

```PHP
SMSOTP\SMSOTPServiceProvider::class
```

## Publish
```
php artisan vendor:publish --provider="SMSOTP\SMSOTPServiceProvider"
php artisan migrate
```

## Usage


To send OTP, remember to include `:code` this will be replaced with the actual code.
```
$sender = app()->make(OTPSender::class);
$sender->send('6399512345678', 'holy shit your otp code is :code');
```

To verify OTP code
```
$verifier = app()->make(OTPVerifier::class);
$verifier->verify('6399512345678', 'A44E8');
```


## Extending

### Using other SMS provider

Create your sms provider
```
class CustomSMSProvider implemnts SMSOTP\Contract\SMSGateway
{
    public function send($number, $message)
    {
        // your implemention
    }
}
```

Update configuration ```config/smsotp.php```

```
'sms' => CustomSMSProvider::class,
```

### Generating your own OTP code
Do the same as creating your own SMS provider.
