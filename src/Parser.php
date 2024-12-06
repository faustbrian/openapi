<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi;

use BaseCodeOy\OpenApi\Data\OpenAPI;

final readonly class Parser
{
    public function __construct(
        private Reader $reader,
    ) {
        //
    }

    public function parse(): OpenAPI
    {
        return OpenAPI::fromReader($this->reader);
    }
}
