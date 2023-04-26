<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use Illuminate\Support\Arr;
use BombenProdukt\OpenApi\Data\Actions\MapArray;
use BombenProdukt\OpenApi\Data\Actions\MapFlatArray;
use BombenProdukt\OpenApi\Data\Actions\MapProperty;
use BombenProdukt\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#schema-object
 */
final class Schema extends Data
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
        public array|string|null $type,
        /** @var Reference[]|Schema[] */
        public ?array $allOf,
        /** @var Reference[]|Schema[] */
        public ?array $oneOf,
        /** @var Reference[]|Schema[] */
        public ?array $anyOf,
        public ?self $not,
        public ?self $items,
        /** @var Reference[]|Schema[] */
        public ?array $properties,
        /** @var bool|Reference|Schema */
        public mixed $additionalProperties,
        public ?string $description,
        public ?string $format,
        public mixed $default,
        public ?bool $nullable,
        public ?Discriminator $discriminator,
        public ?bool $readOnly,
        public ?bool $writeOnly,
        public ?Xml $xml,
        public ?ExternalDocumentation $externalDocs,
        public mixed $example,
        public ?bool $deprecated,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            title: Arr::get($data, 'title'),
            multipleOf: Arr::get($data, 'multipleOf'),
            maximum: Arr::get($data, 'maximum'),
            exclusiveMaximum: Arr::get($data, 'exclusiveMaximum'),
            minimum: Arr::get($data, 'minimum'),
            exclusiveMinimum: Arr::get($data, 'exclusiveMinimum'),
            maxLength: Arr::get($data, 'maxLength'),
            minLength: Arr::get($data, 'minLength'),
            pattern: Arr::get($data, 'pattern'),
            maxItems: Arr::get($data, 'maxItems'),
            minItems: Arr::get($data, 'minItems'),
            uniqueItems: Arr::get($data, 'uniqueItems'),
            maxProperties: Arr::get($data, 'maxProperties'),
            minProperties: Arr::get($data, 'minProperties'),
            required: Arr::get($data, 'required'),
            enum: Arr::get($data, 'enum'),
            type: Arr::get($data, 'type'),
            allOf: MapArray::execute($reader, Arr::get($data, 'allOf'), self::class),
            oneOf: MapArray::execute($reader, Arr::get($data, 'oneOf'), self::class),
            anyOf: MapArray::execute($reader, Arr::get($data, 'anyOf'), self::class),
            not: MapProperty::execute($reader, Arr::get($data, 'not'), self::class),
            items: MapProperty::execute($reader, Arr::get($data, 'items'), self::class),
            properties: MapArray::execute($reader, Arr::get($data, 'properties'), self::class),
            additionalProperties: MapFlatArray::execute($reader, Arr::get($data, 'additionalProperties'), ['bool', self::class]),
            description: Arr::get($data, 'description'),
            format: Arr::get($data, 'format'),
            default: Arr::get($data, 'default'),
            nullable: Arr::get($data, 'nullable'),
            discriminator: MapArray::execute($reader, Arr::get($data, 'discriminator'), Discriminator::class),
            readOnly: Arr::get($data, 'readOnly'),
            writeOnly: Arr::get($data, 'writeOnly'),
            xml: MapArray::execute($reader, Arr::get($data, 'xml'), Xml::class),
            externalDocs: MapArray::execute($reader, Arr::get($data, 'externalDocs'), ExternalDocumentation::class),
            example: Arr::get($data, 'example'),
            deprecated: Arr::get($data, 'deprecated'),
        );
    }
}
