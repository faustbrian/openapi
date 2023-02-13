<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#response-object
 */
class Response extends Data
{
    public function __construct(
        public string $description,
        /** @var string[] | Header[] | Reference[] */
        public ?array $headers,
        /** @var string[] | MediaType[] | Reference[] */
        public ?array $content,
        /** @var string[] | Link[] | Reference[] */
        public ?array $links,
    ) {
        //
    }
}
