<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#example-object
 */
final class Example extends Data
{
    public function __construct(
        public ?string $summary,
        public ?string $description,
        public mixed $value,
        public ?string $externalValue,
    ) {
        //
    }
}
