<?php

declare(strict_types=1);

namespace BaseCodeOy\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#server-variable-object
 */
final class ServerVariable extends Data
{
    public function __construct(
        public ?array $url,
        public string $default,
        public ?string $description,
    ) {
        //
    }
}
