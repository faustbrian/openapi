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
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#operation-object
 */
final class Operation extends Data
{
    public function __construct(
        /** @var array<string> */
        public readonly ?array $tags,
        public readonly ?string $summary,
        public readonly ?string $description,
        public readonly ?ExternalDocumentation $externalDocs,
        public readonly ?string $operationId,
        /** @var array<Parameter>|array<Reference> */
        public readonly ?array $parameters,
        public readonly RequestBody|Reference|null $requestBody,
        /** @var array<Reference>|array<Response> */
        public readonly ?array $responses,
        /** @var array<callable>|array<Reference>|array<string> */
        public readonly ?array $callbacks,
        public readonly bool $deprecated,
        /** @var array<SecurityRequirement> */
        public readonly ?array $security,
        /** @var array<Server> */
        public readonly ?array $servers,
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
