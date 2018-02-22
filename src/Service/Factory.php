<?php

namespace Maalls\BotManBundle\Service;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Cache\DoctrineCache;
use Doctrine\Common\Cache\FilesystemCache;

class Factory {


    public function __construct($application_id, $password, $cache_dir) {

        $this->application_id = $application_id;
        $this->password = $password;

        $this->cache_dir = $cache_dir;

    }

    public function create() {

        DriverManager::loadDriver(\BotMan\Drivers\BotFramework\BotFrameworkDriver::class);

        $config = [
            'botframework' => [
                'app_id' => $this->application_id,
                'app_key' => $this->password,
            ],
        ];
        $cacheDriver = new DoctrineCache(new FilesystemCache($this->cache_dir));
        return \BotMan\BotMan\BotManFactory::create($config, $cacheDriver);

    }

}