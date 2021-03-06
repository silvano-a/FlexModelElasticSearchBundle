<?php

namespace FlexModel\FlexModelElasticsearchBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration validates and merges configuration from the app/config files.
 *
 * @author Niels Nijens <niels@connectholland.nl>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('flex_model_elasticsearch');

        $rootNode
            ->children()
                ->arrayNode('index')
                    ->children()
                        ->scalarNode('name')
                            ->isRequired()
                            ->end()
                        ->variableNode('settings')
                            ->defaultValue(array())
                            ->end()
                        ->variableNode('mappings')
                            ->defaultValue(array())
                            ->end()
                        ->end()
                    ->end()
                ->arrayNode('hosts')
                    ->isRequired()
                    ->prototype('scalar')
                    ->end()
                ->end();

        return $treeBuilder;
    }
}
