<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use BombenProdukt\OpenApi\Data\Actions\MapArray;
use BombenProdukt\OpenApi\Data\Actions\MapProperty;
use BombenProdukt\OpenApi\Reader;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#operation-object
 */
final class Operation extends Data
{
    public function __construct(
        /** @var string[] */
        public ?array $tags,
        public ?string $summary,
        public ?string $description,
        public ?ExternalDocumentation $externalDocs,
        public ?string $operationId,
        /** @var Parameter[]|Reference[] */
        public ?array $parameters,
        public RequestBody|Reference|null $requestBody,
        /** @var Reference[]|Response[] */
        public ?array $responses,
        /** @var callable[]|Reference[]|string[] */
        public ?array $callbacks,
        public ?bool $deprecated,
        /** @var SecurityRequirement[] */
        public ?array $security,
        /** @var Server[] */
        public ?array $servers,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            tags: Arr::get($data, 'tags'),
            summary: Arr::get($data, 'summary'),
            description: Arr::get($data, 'description'),
            externalDocs: MapProperty::execute($reader, Arr::get($data, 'externalDocs'), ExternalDocumentation::class),
            operationId: Arr::get($data, 'operationId'),
            parameters: MapArray::execute($reader, Arr::get($data, 'parameters'), Parameter::class),
            requestBody: MapProperty::execute($reader, Arr::get($data, 'requestBody'), RequestBody::class),
            responses: MapArray::execute($reader, Arr::get($data, 'responses'), Response::class),
            callbacks: MapArray::execute($reader, Arr::get($data, 'callbacks'), ['string', Callback::class]),
            deprecated: Arr::get($data, 'deprecated'),
            security: MapArray::execute($reader, Arr::get($data, 'security'), SecurityRequirement::class),
            servers: MapArray::execute($reader, Arr::get($data, 'servers'), Server::class),
        );
    }
}
