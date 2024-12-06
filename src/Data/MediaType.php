<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi\Data;

use BaseCodeOy\OpenApi\Data\Actions\MapArray;
use BaseCodeOy\OpenApi\Data\Actions\MapProperty;
use BaseCodeOy\OpenApi\Reader;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#media-type-object
 */
final class MediaType extends Data
{
    public function __construct(
        public readonly ?Schema $schema,
        public readonly mixed $example,
        /** @var array<Example>|array<Reference>|array<string> */
        public readonly ?array $examples,
        /** @var array<Encoding>|array<string> */
        public readonly ?array $encoding,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            schema: MapProperty::execute($reader, Arr::get($data, 'schema'), Schema::class),
            example: MapProperty::execute($reader, Arr::get($data, 'example'), Example::class),
            examples: MapArray::execute($reader, Arr::get($data, 'examples'), ['string', Example::class]),
            encoding: MapArray::execute($reader, Arr::get($data, 'encoding'), ['string', Encoding::class]),
        );
    }
}
