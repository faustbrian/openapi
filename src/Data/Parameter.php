<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#parameter-object
 */
final class Parameter extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $in,
        public readonly ?string $description,
        public readonly bool $required = false,
        public readonly bool $deprecated = false,
        public readonly bool $allowEmptyValue = false,
    ) {
        //
    }
}
