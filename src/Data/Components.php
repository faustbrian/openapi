<?php

declare(strict_types=1);

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
        /** @var Schema[]|string[] */
        public ?array $schemas,
        /** @var Reference[]|Response[]|string[] */
        public ?array $responses,
        /** @var Parameter[]|Reference[]|string[] */
        public ?array $parameters,
        /** @var Example[]|Reference[]|string[] */
        public ?array $examples,
        /** @var Reference[]|RequestBody[]|string[] */
        public ?array $requestBodies,
        /** @var Header[]|Reference[]|string[] */
        public ?array $headers,
        /** @var Reference[]|SecurityScheme[]|string[] */
        public ?array $securitySchemes,
        /** @var Link[]|Reference[]|string[] */
        public ?array $links,
        /** @var callable[]|Reference[]|string[] */
        public ?array $callbacks,
        /** @var PathItem[]|Reference[]|string[] */
        public ?array $pathItems,
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
