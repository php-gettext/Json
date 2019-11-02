<?php

namespace Gettext\Tests;

use Gettext\Loader\JsonLoader;
use PHPUnit\Framework\TestCase;

class JsonLoaderTest extends TestCase
{
    public function testJsonLoader()
    {
        $loader = new JsonLoader();

        $translations = $loader->loadFile(__DIR__.'/assets/translations.json');

        $this->assertCount(2, $translations);
        $this->assertSame('testingdomain', $translations->getDomain());

        $translation = $translations->find(null, '%ss must be unique for %ss %ss.');

        $this->assertNotNull($translation);
        $this->assertSame('%ss mora da bude jedinstven za %ss %ss.', $translation->getTranslation());
        $this->assertCount(0, $translation->getPluralTranslations());

        $translation = $translations->find('other-context', '日本人は日本で話される言語です！');

        $this->assertNotNull($translation);
        $this->assertSame('singular', $translation->getTranslation());
        $this->assertCount(2, $translation->getPluralTranslations());
        $this->assertSame(['plural1', 'plural2'], $translation->getPluralTranslations());
    }
}
