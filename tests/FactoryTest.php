<?php

// tests/Util/CalculatorTest.php
namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use Maalls\BotManBundle\Service\Factory;

class BotFactoryTest extends TestCase
{
    public function testCreate()
    {
        $factory = new Factory('', '');
        $bot = $factory->create();
        $this->assertTrue($bot instanceof \BotMan\BotMan\BotMan);
    }
}