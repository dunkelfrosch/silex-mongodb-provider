# SILEX Doctrine MongoDb Provider

*Just another Silex service provider for mongodb, based on Dominik Zogg <dominik.zogg@gmail.com> great repository [saxulum-doctrine-mongodb-provider](https://github.com/saxulum/saxulum-doctrine-mongodb-provider) containing some improvements and refactoring to gain compatibility for silex 2.n/pimple 3.n and PHP 7.n*

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![System Version](https://img.shields.io/badge/version-1.0.1-blue.svg)](VERSION)
[![PHP 7 ready](http://php7ready.timesplinter.ch/dunkelfrosch/silex-mongodb-provider/badge.svg?branch=master)](https://travis-ci.org/dunkelfrosch/silex-mongodb-provider)
[![Build Status](https://travis-ci.org/dunkelfrosch/silex-mongodb-provider.svg?branch=master)](https://travis-ci.org/dunkelfrosch/silex-mongodb-provider)


## Features
 - Support for MongoDB inside [Silex][1] (it does NOT PROVIDE the ODM integration)
 - Support for PHP7 using "alcaeus/mongo-php-adapter" as wrapper for deprecated ext-mongo module
 - ODM integration will provide by [df/silex-doctrine-mongodb-odm-provider][4] (take a look)


## Requirements
 - PHP >= 5.5.n
 - Silex 2.n (pimple 3.n)
 - Doctrine MongoDb (>= 1.3.0)


## Installation

Using [composer](http://getcomposer.org) [df/silex-doctrine-mongodb-provider][3].
```$
composer require df/silex-doctrine-mongodb-provider 
```


## Setup

- Example for one connection:

``` {.php}
$app->register(new DoctrineMongoDbProvider(), [
    'mongodb.options' => [
        'server' => 'mongodb://localhost:27017',
        'options' => [
            'username' => 'your-username',
            'password' => 'your-password',
            'db' => 'mongo_db_01'
        ]
    ]
]);
```

- Example for multiple connections:

``` {.php}
$app->register(new DoctrineMongoDbProvider(), [
    'mongodbs.options' => [
        'mongodb1' => [
            'server' => 'mongodb://localhost:27017',
            'options' => [
                'username' => 'your-username',
                'password' => 'your-username',
                'db' => 'mongo_db_01'
            ]
        ],
        'mongodb2' => [
            'server' => 'mongodb://localhost:27018',
            'options' => [
                'username' => 'your-username',
                'password' => 'your-username',
                'db' => 'mongo_db_02'
            ]
        ]
    ]
));
```


## Usage

- Example for one connection:

``` {.php}
$document = ['key' => 'value'];

$app['mongodb']
    ->selectDatabase('mongo_db_01')
    ->selectCollection('sample')
    ->insert($document)
;
```

- Example for multiple connections:

``` {.php}
$document = ['key' => 'value'];

$app['mongodbs']['mongo1']
    ->selectDatabase('mongo_db_01')
    ->selectCollection('sample')
    ->insert($document)
;
```


## Copyright
- Patrick Paechnatz <patrick.paechnatz@gmail.com>
- Dominik Zogg <dominik.zogg@gmail.com> (the origin service provider author)
- Fabien Potencier <fabien@symfony.com> ([DoctrineServiceProvider][4], Logger)
- Kris Wallsmith <kris@symfony.com> (Logger)

[1]: http://silex.sensiolabs.org/
[2]: http://docs.doctrine-project.org/projects/doctrine-mongodb-odm/en/latest/
[3]: https://packagist.org/packages/df/silex-doctrine-mongodb-provider
[4]: https://packagist.org/packages/df/silex-doctrine-mongodb-odm-provider
[5]: http://silex.sensiolabs.org/doc/providers/doctrine.html
