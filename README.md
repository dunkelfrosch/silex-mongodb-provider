# SILEX DoctrineMongoDbProvider

*This Silex service provider for mongodb is based on Dominik Zogg <dominik.zogg@gmail.com> great repository [saxulum-doctrine-mongodb-provider](https://github.com/saxulum/saxulum-doctrine-mongodb-provider) containing some improvements and refactoring to gain compatibility for silex 3.n and php7. This documentation isn't fully done yet - i'll working on to build the first 1.0.0 stable release within the next days*

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![System Version](https://img.shields.io/badge/version-0.9.9-blue.svg)](VERSION)
[![PHP 7 ready](http://php7ready.timesplinter.ch/dunkelfrosch/silex-mongodb-provider/badge.svg?branch=master)](https://travis-ci.org/dunkelfrosch/silex-mongodb-provider)
[![Build Status](https://travis-ci.org/dunkelfrosch/silex-mongodb-provider.svg?branch=master)](https://travis-ci.org/dunkelfrosch/silex-mongodb-provider)


## Features
 - Support for MongoDB inside [Silex][1] (it does NOT PROVIDE the ODM integration)
 - Support for PHP7 using "alcaeus/mongo-php-adapter" as wrapper for deprecated ext-mongo module


## Requirements
 - PHP >= 5.5.n
 - Silex 2.n (pimple 3.n)
 - Doctrine Mongodb (>= 1.3.0)


## Installation

Add the 'ext-replace' key as shown below within your composer.json
```
    "replace": {
        "ext-mongo": "^1.6"
    },
```

*As long as packagist.org has some troubles fetching the right version from provided repository add our github repository directly inside your composer.json file (line before the "require" key) as shown below ...*
```
...,
"replace": {
    "ext-mongo": "^1.6"
},
"repositories": [
        {
            "type": "package",
            "package": {
                "name": "df/silex-doctrine-mongodb-provider",
                "version": "0.9.9",
                "dist": {
                    "url": "https://github.com/dunkelfrosch/silex-mongodb-provider/archive/0.9.9.zip",
                    "type": "zip"
                }
            }
        }
    ],
...
```

Example for one connection:

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

Example for multiple connections:

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

Example for one connection:

``` {.php}
$document = ['key' => 'value'];

$app['mongodb']
    ->selectDatabase('mongo_db_01')
    ->selectCollection('sample')
    ->insert($document)
;
```

Example for multiple connections:

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
- Dominik Zogg <dominik.zogg@gmail.com> (the origin provider author)
- Fabien Potencier <fabien@symfony.com> ([DoctrineServiceProvider][4], Logger)
- Kris Wallsmith <kris@symfony.com> (Logger)

[1]: http://silex.sensiolabs.org/
[2]: http://docs.doctrine-project.org/projects/doctrine-mongodb-odm/en/latest/
[3]: https://packagist.org/packages/df/silex-doctrine-mongodb-provider
[4]: http://silex.sensiolabs.org/doc/providers/doctrine.html
