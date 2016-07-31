<?php

namespace DF\DoctrineMongoDb\Logger;

/**
 * Interface LoggerInterface
 *
 * @package DF\DoctrineMongoDb\Logger
 */
interface LoggerInterface
{
    /**
     * @param array $query
     * 
     * @return mixed
     */
    public function logQuery(array $query);
}
