<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi\Data\Actions;

final class NormalizeReferenceIdentifier
{
    public static function execute(string $identifier): string
    {
        return \str_replace('/', '.', \mb_substr($identifier, 2));
    }
}
