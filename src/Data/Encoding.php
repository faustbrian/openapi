<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#encoding-object
 */
class Encoding extends Data
{
    public function __construct(
        public ?string $contentType,
        /** @var string[] | Header[] | Reference[] */
        public ?array $headers,
        public ?string $style,
        public ?bool $explode,
        public ?bool $allowReserved,
    ) {
        //
    }
}
