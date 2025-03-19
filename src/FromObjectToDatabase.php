<?php

namespace AP\Scheme;

use Throwable;

/**
 * Defines a contract for converting an object to a primitive or array format
 */
interface FromObjectToDatabase
{
    /**
     * Converts the object into a primitive or array representation
     * Nested arrays also must recursively include primitives or arrays elements
     *
     * @return array|string|int|float|bool|null The converted representation of the object
     * @throws Throwable No related with data errors
     */
    public function fromObject(): array|string|int|float|bool|null;
}