# Embed your Plausible dashboard inside of Filament.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/c6digital/filament-plausible-page.svg?style=flat-square)](https://packagist.org/packages/c6digital/filament-plausible-page)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/c6digital/filament-plausible-page/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/c6digital/filament-plausible-page/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/c6digital/filament-plausible-page/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/c6digital/filament-plausible-page/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/c6digital/filament-plausible-page.svg?style=flat-square)](https://packagist.org/packages/c6digital/filament-plausible-page)

This package allows you to embed your Plausible Analytics dashboard as a page inside of Filament.

## Installation

You can install the package via Composer:

```bash
composer require c6digital/filament-plausible-page
```

## Usage

Register the plugin with Filament.

```php
use C6Digital\FilamentPlausiblePage\FilamentPlausiblePagePlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugin(FilamentPlausiblePagePlugin::make());
}
```

Provide a "Share URL" generated by Plausible in your `.env` file.

```
PLAUSIBLE_SHARE_URL="https://plausible.io/share/mysite.com?auth=blahblahblah
```

Load your panel and view your analytics!

### Disabling Plausible footer text

Use the `hideFooterMark()` method to remove the "Stats powered by Plausible Analytics" footer mark.

```php
return $panel
    ->plugin(
        FilamentPlausiblePagePlugin::make()
            ->hideFooterMark()
    );
```

### Hide "Plausible" page title

Use the `hidePageTitle()` method to hide the page title.

```php
return $panel
    ->plugin(
        FilamentPlausiblePagePlugin::make()
            ->hidePageTitle()
    );
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/c6digital)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
