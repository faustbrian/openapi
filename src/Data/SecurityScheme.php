<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#security-scheme-object
 */
final class SecurityScheme extends Data
{
    public function __construct(
        public string $type,
        public ?string $description,
        public string $name,
        public string $in,
        public string $scheme,
        public ?string $bearerFormat,
        public string $flows,
        public string $openIdConnectUrl,
    ) {
        //
    }
}
