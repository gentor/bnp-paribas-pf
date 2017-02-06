BnpPF
===============

BNP Paribas PF Pricing Service for Laravel

Installation
------------

Installation using composer:

```
composer require gentor/bnp-paribas-pf
```


Add the service provider in `config/app.php`:

```php
Gentor\BnpPF\BnpServiceProvider::class,
```

Add the facade alias in `config/app.php`:

```php
Gentor\BnpPF\Facades\Bnp::class,
```

Configuration
-------------

Convert .pfx certificate to .pem:

```php
openssl pkcs12 -in <cert.pfx> -out <cert.pem> -passin pass:<password> -passout pass:<password>
```

Change your default settings in `app/config/bnp.php`:

```php
<?php
return [
    'merchant_id' => env('BNP_MERCHANT_ID'),
    'certificate' => env('BNP_CERTIFICATE_PATH'),
    'password' => env('BNP_PASSWORD'),
    'test_mode' => env('BNP_TEST_MODE'),
];
```


Documentation
-------------

[BNP Paribas PF](https://www.bnpparibas-pf.bg/)

