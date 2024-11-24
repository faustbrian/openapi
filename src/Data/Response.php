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
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#response-object
 */
final class Response extends Data
{
    public function __construct(
        public readonly string $description,
        /** @var array<Header>|array<Reference>|array<string> */
        public readonly ?array $headers,
        /** @var array<MediaType>|array<Reference>|array<string> */
        public readonly ?array $content,
        /** @var array<Link>|array<Reference>|array<string> */
        public readonly ?array $links,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            description: Arr::get($data, 'description'),
            headers: MapArray::execute($reader, Arr::get($data, 'headers'), ['string', Header::class]),
            content: MapArray::execute($reader, Arr::get($data, 'content'), ['string', MediaType::class]),
            links: MapArray::execute($reader, Arr::get($data, 'links'), ['string', Link::class]),
        );
    }
}
