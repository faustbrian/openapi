<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data\Actions;

use PreemStudio\OpenApi\Reader;

class MapArray
{
    public static function execute(Reader $reader, ?array $items, array|string $class): ?array
    {
        if (empty($items)) {
            return null;
        }

        return array_map(function ($item) use ($reader, $class) {
            if (is_bool($item) && is_array($class) && in_array('bool', $class)) {
                return $item;
            }

            if (is_string($item) && is_array($class) && in_array('string', $class)) {
                return $item;
            }

            return MapProperty::execute($reader, $item, is_array($class) ? $class[1] : $class);
        }, $items);
    }
}
