<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#media-type-object
 */
class MediaType extends Data
{
    public function __construct(
        public ?Schema $schema,
        public ?mixed $example,
        /** @var string[] | Example[] | Reference[] */
        public ?array $examples,
        /** @var string[] | Encoding[] */
        public ?array $encoding,
    ) {
        //
    }
}
