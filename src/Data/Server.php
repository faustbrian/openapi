<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use Illuminate\Support\Arr;
use BombenProdukt\OpenApi\Data\Actions\MapArray;
use BombenProdukt\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#server-object
 */
final class Server extends Data
{
    public function __construct(
        public string $url,
        public ?string $description,
        /** @var ServerVariable[] */
        public ?array $variables,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            url: Arr::get($data, 'url'),
            description: Arr::get($data, 'description'),
            variables: MapArray::execute($reader, Arr::get($data, 'variables'), ServerVariable::class),
        );
    }
}
