<?php

namespace MinimalOriginal\SecurityBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Yaml\Yaml;

class MinimalSecurityExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');
        if ( true === isset($bundles['FOSUserBundle']) ) {

            $file = __DIR__.'/../Resources/config/fos_user_config.yml';
            $fos_user_config = Yaml::parse(file_get_contents($file));

            foreach ($container->getExtensions() as $name => $extension) {
                switch ($name) {
                    case 'fos_user':
                        $container->prependExtensionConfig($name, $fos_user_config);
                        break;
                }
            }
        }
    }
}
