<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Illuminate\Support\Arr;
use PreemStudio\OpenApi\Data\Actions\MapArray;
use PreemStudio\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#encoding-object
 */
final class Encoding extends Data
{
    public function __construct(
        public ?string $contentType,
        /** @var string[] | Header[] | Reference[] */
        public ?array $headers,
        public ?string $style,
        public ?bool $explode,
        public ?bool $allowReserved,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            contentType: Arr::get($data, 'contentType'),
            headers: MapArray::execute($reader, Arr::get($data, 'headers'), ['string', MediaType::class]),
            style: Arr::get($data, 'style'),
            explode: Arr::get($data, 'explode'),
            allowReserved: Arr::get($data, 'allowReserved'),
        );
    }
}
