# Temporary Emails Validator

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Symfony validator for temporary emails, based on [andreis/disposable](https://github.com/andreis/disposable).

## Install

Via Composer

``` bash
$ composer require emanueleminotto/temporary-email-validator
```

## Usage

``` php
use EmanueleMinotto\TemporaryEmailValidator\NotTemporaryEmail;

$constraint = new NotTemporaryEmail();
// $constraint->message = your message

// use the validator to validate the value
$errorList = $this
    ->get('validator')
    ->validate('example@mail-temporaire.fr', $constraint);

$errorMessage = $errorList[0]->getMessage(); // The temporary email "example@mail-temporaire.fr" is not allowed.
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email minottoemanuele@gmail.com instead of using the issue tracker.

## Credits

- [Emanuele Minotto][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/EmanueleMinotto/temporary-email-validator.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/EmanueleMinotto/temporary-email-validator/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/EmanueleMinotto/temporary-email-validator.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/EmanueleMinotto/temporary-email-validator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/EmanueleMinotto/temporary-email-validator.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/EmanueleMinotto/temporary-email-validator
[link-travis]: https://travis-ci.org/EmanueleMinotto/temporary-email-validator
[link-scrutinizer]: https://scrutinizer-ci.com/g/EmanueleMinotto/temporary-email-validator/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/EmanueleMinotto/temporary-email-validator
[link-downloads]: https://packagist.org/packages/EmanueleMinotto/temporary-email-validator
[link-author]: https://github.com/EmanueleMinotto
[link-contributors]: ../../contributors
