<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Illuminate\Support\Arr;
use PreemStudio\OpenApi\Data\Actions\MapArray;
use PreemStudio\OpenApi\Reader;
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
