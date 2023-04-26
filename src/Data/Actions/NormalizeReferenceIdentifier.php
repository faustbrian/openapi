<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data\Actions;

final class NormalizeReferenceIdentifier
{
    public static function execute(string $identifier): string
    {
        return \str_replace('/', '.', \mb_substr($identifier, 2));
    }
}
