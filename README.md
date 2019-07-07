# Quickly add user "name" fields

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/yaroslawww/laravel-eloquent-user-fullname.svg?branch=master)](https://travis-ci.org/yaroslawww/laravel-eloquent-user-fullname) 
[![StyleCI](https://github.styleci.io/repos/195463782/shield?branch=master&style=flat-square)](https://github.styleci.io/repos/195463782)
[![Quality Score](https://img.shields.io/scrutinizer/g/yaroslawww/laravel-eloquent-user-fullname.svg?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-eloquent-user-fullname/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/yaroslawww/laravel-eloquent-user-fullname/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-eloquent-user-fullname/?branch=master)
[![PHP Version](https://img.shields.io/travis/php-v/yaroslawww/laravel-eloquent-user-fullname.svg?style=flat-square)](https://packagist.org/packages/yaroslawww/laravel-eloquent-user-fullname)
[![Packagist Version](https://img.shields.io/packagist/v/yaroslawww/laravel-eloquent-user-fullname.svg)](https://packagist.org/packages/yaroslawww/laravel-eloquent-user-fullname)


Simple helper, to quickly add user "name" fields: `First Name`, `Middle Name`, `Last Name`, `Name`, `Full Name`.
You can quickly add a library and do not write additional tests as the library covers them. Or you can just copy Trait :)

## Installation

You can install the package via composer:

```bash
composer require yaroslawww/laravel-eloquent-user-fullname
```

## Usage

``` php
use Angecode\LaravelFullName\Models\Traits\HasFullName;
...

class User extends Authenticatable
{
     use HasFullName;
     ...
}
```

``` php
$user = User::first();

$user->first_name   // Yaroslav
$user->middle_name   // Dev
$user->last_name   // Georgitsa
$user->name   // Yaroslav Georgitsa
$user->full_name   // Yaroslav Dev Georgitsa
```

### Publish

There added stub migration file to add required fields

```bash
php artisan vendor:publish --provider="Angecode\LaravelFullName\FullNameServiceProvider" --tag="migrations"
```

### Testing

``` bash
composer test
```

### Security

If you discover any security related issues, please email yaroslav.georgitsa@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
