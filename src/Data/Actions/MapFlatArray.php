<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi\Data\Actions;

use BaseCodeOy\OpenApi\Reader;

final class MapFlatArray
{
    public static function execute(Reader $reader, mixed $items, array|string $class): mixed
    {
        if (empty($items)) {
            return null;
        }

        if (\is_bool($items) && \is_array($class) && \in_array('bool', $class, true)) {
            return $items;
        }

        return MapProperty::execute($reader, $items, \is_array($class) ? $class[1] : $class);
    }
}
