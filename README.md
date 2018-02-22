This bundle helps you configure and create BotMan within the symfony framework.

# Requirement

Symfony 4, php 7+


# Installation

Install the symfoy bundle using composer
```console
composer require maalls/botman-bundle
```

Add the bot config in the config/service.yaml as parameter
``` yaml

parameters:
    botman:
        botman:
            conversation_cache_time: 30
        botframework:
            app_id: xxxxxxxxxx
            app_key: xxxxxxxxxx


```

# Example

Create the bot via autowiring:

```php
    // in src/Service/MyService.php
    function __construct(\Maalls\BotManBundle\Service\Factory $factory) {
        
        // Create BotMan with BotFramework Driver.
        $bot = $factory->createBotFramework(); // \BotMan\BotMan\BotMan

        // Config can be added or overwritten
        $bot = $factory->createBotFramework(["botman" => ["conversation_cache_time" => 5]]); 

        // OR with a specific driver
        $bot = $factory->create(z\BotMan\Drivers\Telegram\TelegramDriver::class, ["telegram" => ["token" => "xxxx"]]);

        $bot->hears("(.*)", function($bot, $message) {

            $bot->reply("Anyway, hello.");

        });
    }
```

# Testing

```console 
./vendor/bin/phpunit tests/
```

