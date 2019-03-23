<?php

namespace Slick;

use Psr\Container\ContainerInterface;

interface ContainerAwareInterface
{
    public function setContainer(ContainerInterface $container);
    public function get($serviceName);
    public function has($serviceName);
}