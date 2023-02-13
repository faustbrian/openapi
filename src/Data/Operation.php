<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#operation-object
 */
class Operation extends Data
{
    public function __construct(
        /** @var string[] */
        public ?array $tags,
        public ?string $summary,
        public ?string $description,
        public ?ExternalDocumentation $externalDocs,
        public ?string $operationId,
        /** @var Parameter[] | Reference[] */
        public ?array $parameters,
        /** @var RequestBody[] | Reference[] */
        public ?array $requestBody,
        public ?array $responses,
        /** @var string[]|callable[]|Reference[] */
        public ?array $callbacks,
        public ?bool $deprecated,
        /** @var SecurityRequirement[] */
        public ?array $security,
        /** @var Server[] */
        public ?array $servers,
    ) {
        //
    }
}
