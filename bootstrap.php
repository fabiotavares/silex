<?php

require_once 'vendor/autoload.php';

$app = new \Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/src/FT/Sistema/views',
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());