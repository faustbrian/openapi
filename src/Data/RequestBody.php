<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use Illuminate\Support\Arr;
use BombenProdukt\OpenApi\Data\Actions\MapArray;
use BombenProdukt\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#request-body-object
 */
final class RequestBody extends Data
{
    public function __construct(
        public ?string $description,
        /** @var MediaType[]|string[] */
        public array $content,
        public ?bool $required,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            description: Arr::get($data, 'description'),
            content: MapArray::execute($reader, Arr::get($data, 'content'), ['string', MediaType::class]),
            required: Arr::get($data, 'required'),
        );
    }
}
