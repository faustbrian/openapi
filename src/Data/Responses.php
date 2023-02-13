<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#responses-object
 */
class Responses extends Data
{
    public function __construct(
        /** @var Response[] | Reference[] */
        public array $items,
    ) {
        //
    }

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => Response::from($item), $items));
    }
}
