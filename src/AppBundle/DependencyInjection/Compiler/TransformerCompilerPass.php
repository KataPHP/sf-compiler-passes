<?php

/*
 * This file is part of the sf-compiler-pass project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DependencyInjection\Compiler;

use AppBundle\Chain\TransformerChain;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Transformer compiler pass.
 *
 * @author Michael COULLERET <michael.coulleret@gmail.com>
 */
class TransformerCompilerPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(TransformerChain::class)) {
            return;
        }

        $definition = $container->findDefinition(TransformerChain::class);

        $taggedServices = $container->findTaggedServiceIds('message.transformer');

        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall('AddTransformer', [new Reference($id), $attributes["alias"]]);
            }
        }
    }
}
