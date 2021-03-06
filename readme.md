# BanglalinkSmsGatewayLaravel

[![Latest Version on Packagist][ico-packagist-version]][link-packagist]
[![Latest Version on Github][ico-github-version]][link-github]

## Installation

Via Composer

``` bash
$ composer require arifsajal/banglalink-sms-gateway-laravel
```
Wait for few minutes. Composer will automatically install the package for your project.

## Usage

Open `config/app.php` And Add Below Line In `Providers` Section

```php
Arifsajal\BanglalinkSmsGatewayLaravel\Providers\BanglalinkServiceProvider::class
```
And for Facade Support, Add Below Line In `aliases` Section
 
```php
"Banglalink" => Arifsajal\BanglalinkSmsGatewayLaravel\Facades\\Banglalink::class
```
Than run below command

```bash
$ php artisan vendor:publish --provider="Arifsajal\BanglalinkSmsGatewayLaravel\Providers\BanglalinkServiceProvider"
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Ariful Islam][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-packagist-version]: https://img.shields.io/badge/Packagist-1.0-brightgreen.svg
[ico-github-version]: https://img.shields.io/badge/Github-1.0-brightgreen.svg

[link-packagist]: https://packagist.org/packages/arifsajal/banglalink-sms-gateway-laravel
[link-github]: https://github.com/arifsajal70/banglalink-sms-gateway-laravel
[link-author]: https://github.com/arifsajal70
[link-contributors]: ../../contributors