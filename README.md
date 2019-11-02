# Gettext Json format

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
