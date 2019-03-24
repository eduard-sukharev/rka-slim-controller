<?php

namespace Slick;


use Psr\Container\ContainerInterface;
use Slim\Helper\Set;

/**
 * Declare PSR-11 compatibility
 * @package Slick
 */
class PsrContainer extends Set implements ContainerInterface { }
