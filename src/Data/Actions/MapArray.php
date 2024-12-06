<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi\Data\Actions;

use BaseCodeOy\OpenApi\Reader;

final class MapArray
{
    public static function execute(Reader $reader, ?array $items, array|string $class): ?array
    {
        if ($items === null || $items === []) {
            return null;
        }

        return \array_map(function ($item) use ($reader, $class): bool|string|\Spatie\LaravelData\Data|null {
            if (\is_bool($item) && \is_array($class) && \in_array('bool', $class, true)) {
                return $item;
            }

            if (\is_string($item) && \is_array($class) && \in_array('string', $class, true)) {
                return $item;
            }

            return MapProperty::execute($reader, $item, \is_array($class) ? $class[1] : $class);
        }, $items);
    }
}
