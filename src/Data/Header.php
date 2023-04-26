<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#header-object
 */
final class Header extends Data
{
    public function __construct(
        public string $example,
        public ?Schema $schema,
    ) {
        //
    }
}
