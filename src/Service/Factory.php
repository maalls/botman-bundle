<?php

namespace Maalls\BotManBundle\Service;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Cache\DoctrineCache;
use Doctrine\Common\Cache\FilesystemCache;

class Factory {


    public function __construct($config, $cache_dir) 
    {

        $this->config = $config["config"];
        $this->cache_dir = $cache_dir;

    }

    public function createBotFramework($config = [])
    {

        return $this->create(\BotMan\Drivers\BotFramework\BotFrameworkDriver::class, $config);

    }

    public function create($driver_class, $config) {

        $config = $this->config + $config;
        DriverManager::loadDriver($driver_class);

        $cacheDriver = new DoctrineCache(new FilesystemCache($this->cache_dir));
        return \BotMan\BotMan\BotManFactory::create($config, $cacheDriver);

    }

}