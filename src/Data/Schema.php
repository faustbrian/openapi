<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#schema-object
 */
class Schema extends Data
{
    public function __construct(
        public ?string $title,
        public int|float|null $multipleOf,
        public int|float|null $maximum,
        public ?bool $exclusiveMaximum,
        public int|float|null $minimum,
        public ?bool $exclusiveMinimum,
        public ?int $maxLength,
        public ?int $minLength,
        public ?string $pattern,
        public ?int $maxItems,
        public ?int $minItems,
        public ?bool $uniqueItems,
        public ?int $maxProperties,
        public ?int $minProperties,
        /** @var string[] */
        public ?array $required,
        public ?array $enum,
        public ?string $type,
        /** @var Schema[] | Reference[] */
        public ?array $allOf,
        /** @var Schema[] | Reference[] */
        public ?array $oneOf,
        /** @var Schema[] | Reference[] */
        public ?array $anyOf,
        public Schema|Reference|null $not,
        public Schema|Reference|null $items,
        /** @var Schema[] | Reference[] */
        public ?array $properties,
        public Schema|Reference|bool|null $additionalProperties,
        public ?string $description,
        public ?string $format,
        public mixed $default,
        public ?bool $nullable,
        public Discriminator|null $discriminator,
        public ?bool $readOnly,
        public ?bool $writeOnly,
        public Xml|null $xml,
        public ExternalDocumentation|null $externalDocs,
        public mixed $example,
        public ?bool $deprecated,
    ) {
        //
    }
}
