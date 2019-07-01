<?php

namespace HBM\BootstrapFormBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface {

  /**
   * {@inheritdoc}
   */
  public function getConfigTreeBuilder() {
    $treeBuilder = new TreeBuilder('hbm_bootstrap_form');

    if (method_exists($treeBuilder, 'getRootNode')) {
      $rootNode = $treeBuilder->getRootNode();
    } else {
      $rootNode = $treeBuilder->root('hbm_bootstrap_form');
    }

    $rootNode
      ->children()
        ->arrayNode('classes')->addDefaultsIfNotSet()
          ->children()
            ->scalarNode('help')->defaultValue(['text-muted'])->end()
            ->scalarNode('dev')->defaultValue(['text-muted'])->end()
            ->scalarNode('alerts_ul')->defaultValue([])->end()
            ->scalarNode('alerts_li')->defaultValue(['alert', 'alert-danger'])->end()
          ->end()
        ->end()
        ->arrayNode('elements')->addDefaultsIfNotSet()
          ->children()
            ->scalarNode('help')->defaultValue('small')->end()
            ->scalarNode('dev')->defaultValue('small')->end()
          ->end()
        ->end()
      ->end();

    return $treeBuilder;
  }

}