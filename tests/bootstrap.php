<?php

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->setPsr4('DF\\Tests\\', __DIR__);

\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader([$loader, 'loadClass']);
