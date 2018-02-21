<?php

namespace Maalls\BotManBundle\Service;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;

class Factory {


    public function __construct($application_id, $password) {

        $this->application_id = $application_id;
        $this->password = $password;

    }

    public function create() {

        DriverManager::loadDriver(\BotMan\Drivers\BotFramework\BotFrameworkDriver::class);

        $config = [
            'botframework' => [
                'app_id' => $this->application_id,
                'app_key' => $this->password,
            ],
        ];

        return \BotMan\BotMan\BotManFactory::create($config);

    }

}