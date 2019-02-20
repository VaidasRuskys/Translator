<?php

namespace VaidasRuskys\DatabaseTranslator\Translation\Factory;

use VaidasRuskys\DatabaseTranslator\Translation\Repository\OrmRepository;
use VaidasRuskys\DatabaseTranslator\Translation\Translator;

class TranslatorFactory
{
    /** @var OrmRepository */
    private $ormRepository;

    /**
     * TranslatorFactory constructor.
     * @param OrmRepository $ormRepository
     */
    public function __construct(OrmRepository $ormRepository)
    {
        $this->ormRepository = $ormRepository;
    }

    public function createTranslator()
    {
        $translator = new Translator($this->ormRepository);

        return $translator;
    }
}