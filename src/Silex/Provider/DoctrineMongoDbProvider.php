<?php

namespace DF\DoctrineMongoDb\Silex\Provider;

use DF\DoctrineMongoDb\Provider\DoctrineMongoDbProvider as BaseDoctrineMongoDbProvider;
use Silex\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class DoctrineMongoDbProvider
 * 
 * @package DF\DoctrineMongoDb\Silex\Provider
 */
class DoctrineMongoDbProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function register(Container $container)
    {
        $pimpleServiceProvider = new BaseDoctrineMongoDbProvider;
        $pimpleServiceProvider->register($container);
    }
}
