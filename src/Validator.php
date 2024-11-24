<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi;

use JsonSchema\Validator as JsonSchema;

final class Validator
{
    private JsonSchema $validator;

    public function __construct(
        private Reader $reader,
    ) {
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
