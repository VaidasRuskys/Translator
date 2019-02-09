<?php

namespace VaidasRuskys\DatabaseTranslator\Translation\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use VaidasRuskys\DatabaseTranslator\Translation\Repository\OrmRepository;
use VaidasRuskys\DatabaseTranslator\Translation\Translator;

class CreateTranslatorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $translator = new Definition(Translator::class, [new OrmRepository()]);
        $container->setDefinition('vaidas_ruskys.translator', $translator);
    }
}