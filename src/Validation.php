<?php

namespace AP\Scheme;

use AP\ErrorNode\Errors;
use Throwable;

/**
 * Defines a contract for validating an object's internal state
 */
interface Validation
{
    /**
     * Validates the object’s internal state
     *
     * @return true|Errors
     * @throws Throwable Other no related with data errors
     */
    public function isValid(): true|Errors;
}