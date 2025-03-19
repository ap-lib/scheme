<?php

namespace AP\Scheme;

use AP\ErrorNode\ThrowableErrors;
use Throwable;

/**
 * Defines a contract for converting raw data into an object instance
 */
interface ToObjectFromDatabase
{
    /**
     * Converts raw data into an object instance
     *
     * @param array|string|int|float|bool|null $data The input data to be converted
     * @return static The instantiated object
     * @throws ThrowableErrors If the provided data is invalid or can't be transformed
     * @throws Throwable Other no related with data errors
     */
    public static function toObject(array|string|int|float|bool|null $data): static;
}