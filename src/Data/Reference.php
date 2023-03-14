<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#reference-object
 */
final class Reference extends Data
{
    public function __construct(
        public string $ref,
        public ?string $summary,
        public ?string $description,
    ) {
        //
    }
}
