<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#parameter-object
 */
class Parameter extends Data
{
    public function __construct(
        public string $name,
        public string $in,
        public ?string $description,
        public ?bool $required,
        public ?bool $deprecated,
        public ?bool $allowEmptyValue,
    ) {
        //
    }
}
