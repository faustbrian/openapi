<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#tag-object
 */
class Tag extends Data
{
    public function __construct(
        public string $name,
        public string $description,
    ) {
        //
    }
}
