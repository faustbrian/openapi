<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi;

use JsonSchema\Validator as JsonSchema;

final class Validator
{
    private JsonSchema $validator;

    public function __construct(private Reader $reader)
    {
        $data = $this->reader->all();

        $this->validator = new JsonSchema();
        $this->validator->validate($data, \file_get_contents('schemas/v3.1/schema.json'));
    }

    public function passes(): bool
    {
        return $this->validator->isValid();
    }

    public function fails(): bool
    {
        return !$this->passes();
    }

    public function errors(): array
    {
        return $this->validator->getErrors();
    }
}
