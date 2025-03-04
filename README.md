# AP\Scheme

[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

AP\Scheme provides a structured framework for defining **data validation, transformation, and object conversion** in PHP.  
It offers a set of interfaces and base classes that help implement **safe and consistent data handling** across applications

## Installation

```bash
composer require ap-lib/scheme
```

## Features

- **Data Transformation**: Convert objects to and from structured data formats.
- **Validation**: Implement validation rules and return meaningful error responses.
- **Error Handling**: Standardized error classes to track issues in transformation and validation.
- **Flexible Conversion**: Implement custom strategies for data serialization and deserialization.

## Requirements

- PHP 8.3 or higher

## Getting started

### Implementing `FromObject`
This allows converting an object to a primitive representation

```php
use AP\Scheme\FromObject;

class User implements FromObject
{
    public function __construct(
        private string $name,
        private int $age
    ) {}

    public function fromObject(): array
    {
        return [
            'name' => $this->name,
            'age'  => $this->age,
        ];
    }
}
```

### Implementing `ToObject`
This allows constructing an object from structured data.

```php
use AP\Scheme\ToObject;
use AP\ErrorNode\ThrowableErrors

class User implements ToObject
{
    public function __construct(
        private string $name,
        private int $age
    ) {}

    public static function toObject(array|string|int|float|bool|null $data): static
    {
        if (!is_array($data) || !isset($data['name'], $data['age'])) {
            throw new ThrowableErrors([new BaseError("Invalid input data")]);
        }

        return new self($data['name'], $data['age']);
    }
}
```

### Implementing Validation
This ensures the object maintains a valid internal state

```php
use AP\Scheme\Validation;
use AP\ErrorNode\Error;
use AP\ErrorNode\Errors;

class User implements Validation
{
    public function __construct(
        private string $name,
        private int $age
    ) {}

    public function isValid(): true|DataErrors
    {
        $errors = [];

        if (empty($this->name)) {
            $errors[] = new Error("Name cannot be empty", ["name"]);
        }

        if ($this->age < 0) {
            $errors[] = new Error("Age must be a positive integer", ["age"]);
        }

        return empty($errors) ? true : new Errors($errors);
    }
}

```