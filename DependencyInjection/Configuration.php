<?php

namespace Waldo\DatatableBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('waldo_datatable');

        $rootNode
            ->children()
                ->arrayNode('all')
                ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('action')->defaultTrue()->end()
                        ->scalarNode('search')->defaultFalse()->end()
                    ->end()
                ->end()
                ->arrayNode('js')
                    ->useAttributeAsKey('name')
                    ->prototype('variable')
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
