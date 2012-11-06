<?php

/*
 * This file is part of TextileServiceProvider
 *
 * (c) Ben Tollakson <ben.tollakson@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bt51\Silex\Provider\TextileServiceProvider\Twig;

class TextileExtension extends \Twig_Extension
{
    private $parser;
    
    public function __construct($parser)
    {
        $this->parser = $parser;
    }
    
    public function getFilters()
    {
        return array('textile' => new \Twig_Filter_Method($this, 'textile', array('is_safe' => array('html'))));
    }
    
    public function textile($content)
    {
        return $this->parser->TextileThis($content);
    }
    
    public function getName()
    {
        return 'textile';
    }
}
