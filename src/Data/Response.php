<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use Illuminate\Support\Arr;
use BombenProdukt\OpenApi\Data\Actions\MapArray;
use BombenProdukt\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#response-object
 */
final class Response extends Data
{
    public function __construct(
        public string $description,
        /** @var Header[]|Reference[]|string[] */
        public ?array $headers,
        /** @var MediaType[]|Reference[]|string[] */
        public ?array $content,
        /** @var Link[]|Reference[]|string[] */
        public ?array $links,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            description: Arr::get($data, 'description'),
            headers: MapArray::execute($reader, Arr::get($data, 'headers'), ['string', Header::class]),
            content: MapArray::execute($reader, Arr::get($data, 'content'), ['string', MediaType::class]),
            links: MapArray::execute($reader, Arr::get($data, 'links'), ['string', Link::class]),
        );
    }
}
