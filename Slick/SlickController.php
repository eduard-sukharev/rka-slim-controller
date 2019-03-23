<?php

namespace Slick;

use Psr\Container\ContainerInterface;

class SlickController implements ContainerAwareInterface
{
    /** @var ContainerInterface */
    private $container;

    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function get($serviceName)
    {
        return $this->container->get($serviceName);
    }

    public function has($serviceName)
    {
        return $this->container->has($serviceName);
    }
}