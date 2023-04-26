<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use BombenProdukt\OpenApi\Data\Actions\MapArray;
use BombenProdukt\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#responses-object
 */
final class Responses extends Data
{
    public function __construct(
        /** @var Reference[]|Response[] */
        public array $items,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            items: MapArray::execute($reader, $data, Response::class),
        );
    }
}
