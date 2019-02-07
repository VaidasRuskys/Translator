<?php

namespace VaidasRuskys\Translator\Translation;

use Symfony\Component\Translation\TranslatorInterface;

class Translator implements TranslatorInterface
{
    public function trans($id, array $parameters = array(), $domain = null, $locale = null)
    {
        // TODO: Implement trans() method.
    }

    public function transChoice($id, $number, array $parameters = array(), $domain = null, $locale = null)
    {
        // TODO: Implement transChoice() method.
    }

    public function setLocale($locale)
    {
        // TODO: Implement setLocale() method.
    }

    public function getLocale()
    {
        // TODO: Implement getLocale() method.
    }

}