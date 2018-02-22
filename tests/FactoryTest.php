<?php

// tests/Util/CalculatorTest.php
namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use Maalls\BotManBundle\Service\Factory;

class BotFactoryTest extends TestCase
{
    public function testCreateBotFramework()
    {   
        
        $config = ["botframework" => ["app_id" => "lllll", "app_key" => "llllll"]];
        $factory = new Factory($config, __dir__ . "/cache_dir");
        $bot = $factory->createBotFramework();
        $this->assertTrue($bot instanceof \BotMan\BotMan\BotMan);

    }
}