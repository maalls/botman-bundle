<?php 

// src/Acme/HelloBundle/DependencyInjection/AcmeHelloExtension.php
namespace Maalls\BotManBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class MaallsBotManExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
        $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yaml');


    }
}