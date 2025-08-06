<?php

namespace AP\Scheme;

interface OpenAPIModificator
{
    public function updateOpenAPIElement(array $spec): array;
}