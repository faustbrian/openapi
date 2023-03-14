<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#external-documentation-object
 */
final class ExternalDocumentation extends Data
{
    public function __construct(
        public ?string $description,
        public string $url,
    ) {
        //
    }
}
