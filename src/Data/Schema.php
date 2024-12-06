<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi\Data;

use BaseCodeOy\OpenApi\Data\Actions\MapArray;
use BaseCodeOy\OpenApi\Data\Actions\MapFlatArray;
use BaseCodeOy\OpenApi\Data\Actions\MapProperty;
use BaseCodeOy\OpenApi\Reader;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#schema-object
 */
final class Schema extends Data
{
    public function __construct(
        public readonly ?string $title,
        public readonly int|float|null $multipleOf,
        public readonly int|float|null $maximum,
        public readonly int|float|null $minimum,
        public readonly ?int $maxLength,
        public readonly ?int $minLength,
        public readonly ?string $pattern,
        public readonly ?int $maxItems,
        public readonly ?int $minItems,
        public readonly ?int $maxProperties,
        public readonly ?int $minProperties,
        /** @var array<string> */
        public readonly ?array $required,
        public readonly ?array $enum,
        public readonly array|string|null $type,
        /** @var array<Reference>|array<self> */
        public readonly ?array $allOf,
        /** @var array<Reference>|array<self> */
        public readonly ?array $oneOf,
        /** @var array<Reference>|array<self> */
        public readonly ?array $anyOf,
        public readonly ?self $not,
        public readonly ?self $items,
        /** @var array<Reference>|array<self> */
        public readonly ?array $properties,
        /** @var bool|Reference|self */
        public readonly mixed $additionalProperties,
        public readonly ?string $description,
        public readonly ?string $format,
        public readonly mixed $default,
        public readonly ?Discriminator $discriminator,
        public readonly ?Xml $xml,
        public readonly ?ExternalDocumentation $externalDocs,
        public readonly mixed $example,
        public readonly bool $exclusiveMaximum = false,
        public readonly bool $exclusiveMinimum = false,
        public readonly bool $uniqueItems = false,
        public readonly bool $nullable = false,
        public readonly bool $readOnly = false,
        public readonly bool $writeOnly = false,
        public readonly bool $deprecated = false,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            title: Arr::get($data, 'title'),
            multipleOf: Arr::get($data, 'multipleOf'),
            maximum: Arr::get($data, 'maximum'),
            exclusiveMaximum: Arr::get($data, 'exclusiveMaximum') ?? false,
            minimum: Arr::get($data, 'minimum'),
            exclusiveMinimum: Arr::get($data, 'exclusiveMinimum') ?? false,
            maxLength: Arr::get($data, 'maxLength'),
            minLength: Arr::get($data, 'minLength'),
            pattern: Arr::get($data, 'pattern'),
            maxItems: Arr::get($data, 'maxItems'),
            minItems: Arr::get($data, 'minItems'),
            uniqueItems: Arr::get($data, 'uniqueItems') ?? false,
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
            nullable: Arr::get($data, 'nullable') ?? false,
            discriminator: MapArray::execute($reader, Arr::get($data, 'discriminator'), Discriminator::class),
            readOnly: Arr::get($data, 'readOnly') ?? false,
            writeOnly: Arr::get($data, 'writeOnly') ?? false,
            xml: MapArray::execute($reader, Arr::get($data, 'xml'), Xml::class),
            externalDocs: MapArray::execute($reader, Arr::get($data, 'externalDocs'), ExternalDocumentation::class),
            example: Arr::get($data, 'example'),
            deprecated: Arr::get($data, 'deprecated') ?? false,
        );
    }
}
