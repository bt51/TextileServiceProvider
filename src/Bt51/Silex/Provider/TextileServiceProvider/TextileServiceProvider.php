<?php

/*
 * This file is part of TextileServiceProvider
 *
 * (c) Ben Tollakson <ben.tollakson@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bt51\Silex\Provider\TextileServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Bt51\Silex\Provider\TextileServiceProvider\Twig\TextileExtension;

class TextileServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        if (! isset($app['twig'])) {
            throw new \InvalidArgumentException('You must register the twig service provider first');
        }
        
        $app['textile.configuration'] = (isset($app['textile.configuration']) ? $app['textile.configuration'] : 'xhtml');
        
        $app['textile'] = $app->share(function () use ($app) {
            return new \Textile($app['textile.configuration']);
        });
        
        $app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
            $twig->addExtension(new TextileExtension($app['textile']));
            return $twig;
        }));
    }   

    public function boot(Application $app)
    {   
    }   
}
