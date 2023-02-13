<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#paths-object
 */
class Paths extends Data
{
    public function __construct(
        /** @var PathItem[] | Reference[] */
        public array $items,
    ) {
        //
    }

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => PathItem::from($item), $items));
    }
}
