<?php

namespace Gettext\Tests;

use Gettext\Generator\JsonGenerator;
use Gettext\Translation;
use Gettext\Translations;
use PHPUnit\Framework\TestCase;

class JsonGeneratorTest extends TestCase
{
    public function testJsonGenerator()
    {
        $translations = Translations::create('testingdomain');
        $translations->setLanguage('ru');

        $translation = Translation::create(null, 'Ensure this value has at least %(limit_value)d character (it has %sd).');
        $translations->add($translation);

        $translation = Translation::create(null, '%ss must be unique for %ss %ss.');
        $translation->translate('%ss mora da bude jedinstven za %ss %ss.');
        $translations->add($translation);

        $translation = Translation::create('other-context', '日本人は日本で話される言語です！');
        $translation->translate('singular');
        $translation->translatePlural('plural1', 'plural2', 'plural3');
        $translations->add($translation);

        $generator = new JsonGenerator();
        $generator->jsonOptions(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $json = $generator->generateString($translations);
        $expected = file_get_contents(__DIR__.'/assets/translations.json');

        $this->assertSame($expected, $json);
    }
}
