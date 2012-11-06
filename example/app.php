<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Bt51\Silex\Provider\TextileServiceProvider\TextileServiceProvider;

$app = new Application();

$app->register(TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views'
));

$app->register(new TextileServiceProvider(),
			   array('textile.configuration' => array()));

$app->get('/', function () use ($app) {
    $text = 'Hello World';
    
    return $app['twig']->render('test.html.twig', array(
        'text' => $text
    ));
});
