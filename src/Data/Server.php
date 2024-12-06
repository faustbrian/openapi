<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi\Data;

use BaseCodeOy\OpenApi\Data\Actions\MapArray;
use BaseCodeOy\OpenApi\Reader;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#server-object
 */
final class Server extends Data
{
    public function __construct(
        public readonly string $url,
        public readonly ?string $description,
        /** @var array<ServerVariable> */
        public readonly ?array $variables,
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
