# Gettext Json format

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
![Build Status][ico-ga]
[![Quality Score][ico-scrutinizer]][link-scrutinizer]
[![Total Downloads][ico-downloads]][link-downloads]

Created by Oscar Otero <http://oscarotero.com> <oom@oscarotero.com> (MIT License)

Json loader and generator to use with [gettext/gettext](https://github.com/php-gettext/Gettext)

## Installation

```
composer require gettext/json
```

## Usage example

```php
use Gettext\Loader\PoLoader;
use Gettext\Loader\JsonLoader;
use Gettext\Generator\JsonGenerator;
use Gettext\Translations;

//Load a .po file and export to .json
$translations = (new PoLoader())->loadFile('locales/translations.po');
(new JsonGenerator())->generateFile($translations, 'locales/translations.json');

//You can load the json file with JsonLoader
$loadedTranslations = (new JsonLoader())->loadFile('locales/translations.json');
```

---

Please see [CHANGELOG](CHANGELOG.md) for more information about recent changes and [CONTRIBUTING](CONTRIBUTING.md) for contributing details.

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/gettext/json.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-ga]: https://github.com/php-gettext/Json/workflows/testing/badge.svg
[ico-scrutinizer]: https://img.shields.io/scrutinizer/g/php-gettext/Json.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gettext/json.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/gettext/json
[link-scrutinizer]: https://scrutinizer-ci.com/g/php-gettext/Json
[link-downloads]: https://packagist.org/packages/gettext/json
