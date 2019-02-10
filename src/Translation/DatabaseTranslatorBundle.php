<?php

namespace VaidasRuskys\DatabaseTranslator\Translation;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use VaidasRuskys\DatabaseTranslator\Translation\DependencyInjection\Compiler\CreateTranslatorPass;

class DatabaseTranslatorBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass($translatorPass = new CreateTranslatorPass());
    }

    public function getContainerExtension()
    {
        return new DatabaseTranslatorExtension();
    }
}