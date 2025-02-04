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
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#license-object
 */
final class License extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $identifier,
        public readonly ?string $url,
    ) {
        //
    }
}
