<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Illuminate\Support\Arr;
use PreemStudio\OpenApi\Data\Actions\MapArray;
use PreemStudio\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#components-object
 */
class Components extends Data
{
    public function __construct(
        /** @var string[] | Schema[] */
        public ?array $schemas,
        /** @var string[] | Response[] | Reference[] */
        public ?array $responses,
        /** @var string[] | Parameter[] | Reference[] */
        public ?array $parameters,
        /** @var string[] | Example[] | Reference[] */
        public ?array $examples,
        /** @var string[] | RequestBody[] | Reference[] */
        public ?array $requestBodies,
        /** @var string[] | Header[] | Reference[] */
        public ?array $headers,
        /** @var string[] | SecurityScheme[] | Reference[] */
        public ?array $securitySchemes,
        /** @var string[] | Link[] | Reference[] */
        public ?array $links,
        /** @var string[]|callable[]|Reference[] */
        public ?array $callbacks,
        /** @var string[] | PathItem[] | Reference[] */
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
