<?php

namespace IDCI\Bundle\DummyBundle\DependencyInjection\Compiler;

use IDCI\Bundle\HelloWorldBundle\DataCollector\HelloWorldDataCollector;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AddExtraDebugDataCompilerPass implements CompilerPassInterface
{
    public const EXTRA_DATA = [
        [
            'label' => 'Dummy',
            'value' => 'v0',
        ],
        [
            'label' => 'Message',
            'value' => 'Hello from Dummy !'
        ]
    ];

    public function process(ContainerBuilder $container): void
    {
        if (!$container->has(HelloWorldDataCollector::class)) {
            return;
        }

        $helloWorldDataCollectorDefinition = $container->findDefinition(HelloWorldDataCollector::class);

        foreach (self::EXTRA_DATA as $data) {
            $helloWorldDataCollectorDefinition->addMethodCall('addExtraData', [$data]);
        }
    }
}
