<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#path-item-object
 */
class PathItem extends Data
{
    public function __construct(
        public ?string $ref,
        public ?string $summary,
        public ?string $description,
        public ?Operation $get,
        public ?Operation $put,
        public ?Operation $post,
        public ?Operation $delete,
        public ?Operation $options,
        public ?Operation $head,
        public ?Operation $patch,
        public ?Operation $trace,
        /** @var Server[] */
        public ?array $servers,
        /** @var Parameter[] | Reference[] */
        public ?array $parameters,
    ) {
        //
    }
}
