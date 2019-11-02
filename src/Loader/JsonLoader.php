<?php
declare(strict_types = 1);

namespace Gettext\Loader;

use Gettext\Headers;
use Gettext\Translations;

/**
 * Class to load a json file
 */
final class JsonLoader extends Loader
{
    public function loadString(string $string, Translations $translations = null): Translations
    {
        $array = json_decode($string, true);

        return $this->loadArray($array, $translations);
    }

    public function loadArray(array $array, Translations $translations = null): Translations
    {
        if (!$translations) {
            $translations = $this->createTranslations();
        }

        $messages = $array['messages'] ?? [];

        foreach ($messages as $context => $contextTranslations) {
            if ($context === '') {
                $context = null;
            }

            foreach ($contextTranslations as $original => $value) {
                if ($original === '') {
                    continue;
                }

                $translation = $this->createTranslation($context, $original);
                $translations->add($translation);

                if (is_array($value)) {
                    $translation->translate(array_shift($value));
                    $translation->translatePlural(...$value);
                } else {
                    $translation->translate($value);
                }
            }
        }

        if (!empty($array['domain'])) {
            $translations->setDomain($array['domain']);
        }

        if (!empty($array['plural-forms'])) {
            $translations->getHeaders()->set(Headers::HEADER_PLURAL, $array['plural-forms']);
        }

        return $translations;
    }
}
