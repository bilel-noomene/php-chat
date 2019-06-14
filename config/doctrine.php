<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$paths = [dirname(__DIR__) . '/src/Entity'];

$isDevMode = getenv('APP_ENV') === 'dev';
$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => getenv('DATABASE_USER'),
    'password' => getenv('DATABASE_PASSWORD'),
    'dbname' => getenv('DATABASE_NAME'),
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);