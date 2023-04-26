<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#license-object
 */
final class License extends Data
{
    public function __construct(
        public string $name,
        public ?string $identifier,
        public ?string $url,
    ) {
        //
    }
}
