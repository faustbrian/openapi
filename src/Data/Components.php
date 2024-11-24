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
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#components-object
 */
final class Components extends Data
{
    public function __construct(
        /** @var array<Schema>|array<string> */
        public readonly ?array $schemas,
        /** @var array<Reference>|array<Response>|array<string> */
        public readonly ?array $responses,
        /** @var array<Parameter>|array<Reference>|array<string> */
        public readonly ?array $parameters,
        /** @var array<Example>|array<Reference>|array<string> */
        public readonly ?array $examples,
        /** @var array<Reference>|array<RequestBody>|array<string> */
        public readonly ?array $requestBodies,
        /** @var array<Header>|array<Reference>|array<string> */
        public readonly ?array $headers,
        /** @var array<Reference>|array<SecurityScheme>|array<string> */
        public readonly ?array $securitySchemes,
        /** @var array<Link>|array<Reference>|array<string> */
        public readonly ?array $links,
        /** @var array<callable>|array<Reference>|array<string> */
        public readonly ?array $callbacks,
        /** @var array<PathItem>|array<Reference>|array<string> */
        public readonly ?array $pathItems,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            schemas: MapArray::execute($reader, Arr::get($data, 'schemas'), ['string', Schema::class]),
            responses: MapArray::execute($reader, Arr::get($data, 'responses'), ['string', Response::class]),
            parameters: MapArray::execute($reader, Arr::get($data, 'parameters'), ['string', Parameter::class]),
            examples: MapArray::execute($reader, Arr::get($data, 'examples'), ['string', Example::class]),
            requestBodies: MapArray::execute($reader, Arr::get($data, 'requestBodies'), ['string', RequestBody::class]),
            headers: MapArray::execute($reader, Arr::get($data, 'headers'), ['string', Header::class]),
            securitySchemes: MapArray::execute($reader, Arr::get($data, 'securitySchemes'), ['string', SecurityScheme::class]),
            links: MapArray::execute($reader, Arr::get($data, 'links'), ['string', Link::class]),
            callbacks: MapArray::execute($reader, Arr::get($data, 'callbacks'), ['string', Callback::class]),
            pathItems: MapArray::execute($reader, Arr::get($data, 'pathItems'), ['string', PathItem::class]),
        );
    }
}
