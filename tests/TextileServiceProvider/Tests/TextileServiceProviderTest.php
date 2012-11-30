<?php

/*
 * This file is part of TextileServiceProvider
 *
 * (c) Ben Tollakson <ben.tollakson@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TextileServiceProvider\Tests;

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Bt51\Silex\Provider\TextileServiceProvider\TextileServiceProvider;

class TextileServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if (!class_exists('Textile')) {
            $this->markTestSkipped('Textile is not installed');
        }
    }
    
    public function testTextile()
    {
        $parser = $this->getParser();
        $text = $parser->TextileThis('Hello World');
        $this->assertEquals('<p>Hello World</p>', trim($text));
    }
    
    public function testSilexTextile()
    {
        if (!class_exists('Twig_Environment')) {
            $this->markTestSkipped('Twig is not installed.');
        }
        
        $app = new Application();
        
        $app->register(new TwigServiceProvider());
        
        $app->register(new TextileServiceProvider());
        
        $text = $app['textile']->TextileThis('Hello World');
        $this->assertEquals('<p>Hello World</p>', trim($text));
    }
    
    public function testTwigExtension()
    {
        if (!class_exists('Twig_Environment')) {
            $this->markTestSkipped('Twig is not installed.');
        }

        $app = new Application();

        $app->register(new TwigServiceProvider());
        
        $app->register(new TextileServiceProvider());

        $this->assertInstanceOf('Bt51\\Silex\\Provider\\TextileServiceProvider\\Twig\\TextileExtension',
                                $app['twig']->getExtension('textile'));
    }
    
    protected function getParser()
    {
        return new \Textile();
    }
}
