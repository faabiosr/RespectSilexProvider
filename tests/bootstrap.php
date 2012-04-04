<?php

require_once __DIR__.'/../vendor/silex.phar';
//require_once __DIR__.'/../src/Respect/Validation/Validator.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;
//
$loader = new UniversalClassLoader();
$loader->registerNamespace('Respect',__DIR__.'/../src');
$loader->register();