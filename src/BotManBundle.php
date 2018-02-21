<?php

namespace Maalls\BotManBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Maalls\BotManBundle\DependencyInjection\MaallsBotManExtension;

class BotManBundle extends Bundle
{

    public function getContainerExtension()
    {
        return new MaallsBotManExtension();
    }


}