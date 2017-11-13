<?php


namespace Pet\Plugins;


use Pet\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container)
}