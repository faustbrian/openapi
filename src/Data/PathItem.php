<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi\Data;

use BaseCodeOy\OpenApi\Data\Actions\MapArray;
use BaseCodeOy\OpenApi\Data\Actions\MapProperty;
use BaseCodeOy\OpenApi\Reader;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#path-item-object
 */
final class PathItem extends Data
{
    public function __construct(
        public readonly ?string $ref,
        public readonly ?string $summary,
        public readonly ?string $description,
        public readonly ?Operation $get,
        public readonly ?Operation $put,
        public readonly ?Operation $post,
        public readonly ?Operation $delete,
        public readonly ?Operation $options,
        public readonly ?Operation $head,
        public readonly ?Operation $patch,
        public readonly ?Operation $trace,
        /** @var array<Server> */
        public readonly ?array $servers,
        /** @var array<Parameter>|array<Reference> */
        public readonly ?array $parameters,
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
