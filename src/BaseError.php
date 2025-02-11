<?php

namespace AP\Scheme;

/**
 * Base class for errors encountered during casting and validation operations
 */
class BaseError
{
    /**
     * @param string $message The error message
     * @param array<string> $path The path associated with the error
     */
    public function __construct(
        readonly public string $message,
        public array           $path = [],
    )
    {
    }
}
