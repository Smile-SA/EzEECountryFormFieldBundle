<?php

namespace Smile\EzEECountryFormFieldBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Yaml\Yaml;

class SmileEzEECountryFormFieldExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('validator_services.yml');
    }

    /**
     * Prepend settings
     *
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
        $container->prependExtensionConfig('assetic', array('bundles' => array('SmileEzEECountryFormFieldBundle')));

        $this->prependFields($container);
    }

    /**
     * Prepend ezstudio form field definition
     *
     * @param ContainerBuilder $container
     */
    private function prependFields(ContainerBuilder $container)
    {
        $fieldsConfigFile = __DIR__ . '/../Resources/config/fields.yml';
        $config = Yaml::parse(file_get_contents($fieldsConfigFile));
        $container->prependExtensionConfig('ez_systems_form_builder', $config);
        $container->addResource(new FileResource($fieldsConfigFile));
    }
}
