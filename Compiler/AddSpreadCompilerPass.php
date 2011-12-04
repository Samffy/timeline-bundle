<?php

namespace Highco\TimelineBundle\Compiler;

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class AddSpreadCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        foreach($container->findTaggedServiceIds('highco.timeline.spread') as $id => $tags)
        {
            $container->getDefinition('highco.timeline.spread.manager')->addMethodCall('add', array($container->getDefinition($id)));
        }
    }
}
