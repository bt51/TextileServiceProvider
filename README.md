TextileServiceProvider
================

The TextileServiceProvider provides the "netcarver/textile" library for silex.

Installation
------------

Create a composer.json in your project

    {
        "require": {
            "bt51/textile-serviceprovider": "dev-master"
        }
    }

Read more on composer here: http://getcomposer.org

Parameters
----------

* **textile.configuration**: An array of options to be passed to the parser's constructor

Services
--------

* **textile**: Instance of Textile

Registering
----------

See the *example/* directory to see how to register the service

Twig
----

There is also a twig filter registered within twig extensions.
See the *example/* directory for more information on how to use it.

License
-------

MIT
