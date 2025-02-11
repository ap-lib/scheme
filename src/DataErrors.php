<?php

namespace AP\Scheme;

use Error;
use RuntimeException;

/**
 * Exception thrown when data validation or casting errors occur
 */
class DataErrors extends Error
{
    protected array $errors;

    /**
     * @param array<BaseError> $errors The list of encountered errors
     * @throws RuntimeException If any provided error isn't an instance of `AP\Scheme\BaseError`
     */
    public function __construct(array $errors)
    {
        foreach ($errors as $error) {
            if (!($error instanceof BaseError)) {
                throw new RuntimeException("All cast errors must extend " . BaseError::class);
            }
            $this->errors[] = $error;
        }
        parent::__construct("Casting error");
    }

    /**
     * Retrieves the list of encountered errors
     *
     * @return array<BaseError> list of errors
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}