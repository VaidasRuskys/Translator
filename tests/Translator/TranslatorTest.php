<?php

namespace VaidasRuskys\DatabaseTranslator\Tests\Translator;

use PHPUnit\Framework\TestCase;
use VaidasRuskys\DatabaseTranslator\Translation\Translator;

class TranslatorTest extends TestCase
{
    /** @var Translator */
    private $translator;

    public function testTrans()
    {
        $this->assertEquals(null, $this->translator->trans('debug.id'));
    }

    public function setUp(): void
    {
        $this->translator = new Translator();
    }
}
