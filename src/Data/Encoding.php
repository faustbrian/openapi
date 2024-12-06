<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi\Data;

use BaseCodeOy\OpenApi\Data\Actions\MapArray;
use BaseCodeOy\OpenApi\Reader;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#encoding-object
 */
final class Encoding extends Data
{
    public function __construct(
        public readonly ?string $contentType,
        /** @var array<Header>|array<Reference>|array<string> */
        public readonly ?array $headers,
        public readonly ?string $style,
        public readonly bool $explode,
        public readonly bool $allowReserved,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            contentType: Arr::get($data, 'contentType'),
            headers: MapArray::execute($reader, Arr::get($data, 'headers'), ['string', MediaType::class]),
            style: Arr::get($data, 'style'),
            explode: Arr::get($data, 'explode'),
            allowReserved: Arr::get($data, 'allowReserved'),
        );
    }
}
