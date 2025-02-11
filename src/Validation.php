<?php

namespace AP\Scheme;

use Throwable;

/**
 * Defines a contract for validating an object's internal state
 */
interface Validation
{
    /**
     * Validates the object’s internal state
     *
     * @return true|DataErrors
     * @throws Throwable Other no related with data errors
     */
    public function isValid(): true|DataErrors;
}