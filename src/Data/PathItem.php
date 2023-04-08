<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Illuminate\Support\Arr;
use PreemStudio\OpenApi\Data\Actions\MapArray;
use PreemStudio\OpenApi\Data\Actions\MapProperty;
use PreemStudio\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#path-item-object
 */
final class PathItem extends Data
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
        /** @var Parameter[]|Reference[] */
        public ?array $parameters,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            ref: Arr::get($data, 'ref'),
            summary: Arr::get($data, 'summary'),
            description: Arr::get($data, 'description'),
            get: MapProperty::execute($reader, Arr::get($data, 'get'), Operation::class),
            put: MapProperty::execute($reader, Arr::get($data, 'put'), Operation::class),
            post: MapProperty::execute($reader, Arr::get($data, 'post'), Operation::class),
            delete: MapProperty::execute($reader, Arr::get($data, 'delete'), Operation::class),
            options: MapProperty::execute($reader, Arr::get($data, 'options'), Operation::class),
            head: MapProperty::execute($reader, Arr::get($data, 'head'), Operation::class),
            patch: MapProperty::execute($reader, Arr::get($data, 'patch'), Operation::class),
            trace: MapProperty::execute($reader, Arr::get($data, 'trace'), Operation::class),
            servers: MapArray::execute($reader, Arr::get($data, 'servers'), Server::class),
            parameters: MapArray::execute($reader, Arr::get($data, 'parameters'), Parameter::class),
        );
    }
}
