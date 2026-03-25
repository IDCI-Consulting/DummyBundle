<?php

namespace IDCI\Bundle\DummyBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use IDCI\Bundle\DummyBundle\DependencyInjection\Compiler\AddExtraDebugDataCompilerPass;

class DummyBundle extends AbstractBundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new AddExtraDebugDataCompilerPass());
    }
}
