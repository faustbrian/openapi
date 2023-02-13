<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#link-object
 */
class Link extends Data
{
    public function __construct(
        public ?string $operationRef,
        public ?string $operationId,
        /** @var string[] | Parameter[] | Reference[] */
        public ?array $parameters,
        public ?RequestBody $requestBody,
        public ?string $description,
        public ?Server $server,
    ) {
        //
    }
}
